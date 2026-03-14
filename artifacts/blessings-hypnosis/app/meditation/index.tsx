import React, { useState, useRef, useEffect } from 'react';
import {
  View, Text, StyleSheet, ScrollView, TouchableOpacity,
  Platform, Animated,
} from 'react-native';
import { Ionicons } from '@expo/vector-icons';
import { router } from 'expo-router';
import { useSafeAreaInsets } from 'react-native-safe-area-context';
import { GradientBackground } from '@/components/GradientBackground';
import { Colors } from '@/constants/colors';

const WEB_TOP = Platform.OS === 'web' ? 67 : 0;
const WEB_BOTTOM = Platform.OS === 'web' ? 34 : 0;

const MEDITATIONS = [
  { id: 'mindfulness', title: 'Mindfulness', duration: '10 min', level: 'Beginner', color: '#4CAF50', description: 'Anchor yourself in the present moment with gentle awareness.' },
  { id: 'visualization', title: 'Sacred Visualization', duration: '15 min', level: 'Intermediate', color: '#7B2FBE', description: 'Journey through healing landscapes of light and color.' },
  { id: 'chakra', title: 'Chakra Balancing', duration: '20 min', level: 'Intermediate', color: Colors.accentLight, description: 'Align and harmonize your seven energy centers.' },
  { id: 'manifestation', title: 'Manifestation', duration: '12 min', level: 'All Levels', color: Colors.teal, description: 'Attract your desires through focused intention and feeling.' },
  { id: 'yoga_nidra', title: 'Yoga Nidra', duration: '30 min', level: 'Advanced', color: '#FF9800', description: 'Enter the sleep-wake threshold for deep subconscious transformation.' },
];

const LEVEL_COLORS = { Beginner: Colors.teal, Intermediate: Colors.accentLight, Advanced: '#FF6B6B', 'All Levels': Colors.violetLight };

function TimerDisplay({ seconds }: { seconds: number }) {
  const mins = Math.floor(seconds / 60).toString().padStart(2, '0');
  const secs = (seconds % 60).toString().padStart(2, '0');
  return (
    <Text style={styles.timerText}>{mins}:{secs}</Text>
  );
}

export default function MeditationScreen() {
  const insets = useSafeAreaInsets();
  const [selected, setSelected] = useState<typeof MEDITATIONS[0] | null>(null);
  const [playing, setPlaying] = useState(false);
  const [time, setTime] = useState(0);
  const pulseAnim = useRef(new Animated.Value(1)).current;
  const ringAnim = useRef(new Animated.Value(0)).current;

  useEffect(() => {
    if (playing) {
      Animated.loop(
        Animated.sequence([
          Animated.parallel([
            Animated.timing(pulseAnim, { toValue: 1.08, duration: 2000, useNativeDriver: true }),
            Animated.timing(ringAnim, { toValue: 1, duration: 2000, useNativeDriver: true }),
          ]),
          Animated.parallel([
            Animated.timing(pulseAnim, { toValue: 1, duration: 2000, useNativeDriver: true }),
            Animated.timing(ringAnim, { toValue: 0, duration: 2000, useNativeDriver: true }),
          ]),
        ])
      ).start();
    } else {
      pulseAnim.setValue(1);
      ringAnim.setValue(0);
    }
  }, [playing]);

  useEffect(() => {
    let timer: ReturnType<typeof setInterval> | null = null;
    const maxTime = selected ? parseInt(selected.duration) * 60 : 600;
    if (playing && time < maxTime) {
      timer = setInterval(() => setTime(t => t + 1), 1000);
    } else if (time >= maxTime) {
      setPlaying(false);
    }
    return () => { if (timer) clearInterval(timer); };
  }, [playing, time, selected]);

  const handleSelect = (m: typeof MEDITATIONS[0]) => {
    setSelected(m);
    setPlaying(false);
    setTime(0);
  };

  const ringOpacity = ringAnim.interpolate({ inputRange: [0, 1], outputRange: [0, 0.3] });
  const maxTime = selected ? parseInt(selected.duration) * 60 : 600;
  const progress = maxTime > 0 ? time / maxTime : 0;

  return (
    <GradientBackground>
      <ScrollView
        style={styles.scroll}
        contentContainerStyle={[
          styles.content,
          { paddingTop: insets.top + WEB_TOP + 16, paddingBottom: insets.bottom + WEB_BOTTOM + 40 }
        ]}
        showsVerticalScrollIndicator={false}
      >
        <TouchableOpacity style={styles.backBtn} onPress={() => router.back()}>
          <Ionicons name="arrow-back" size={22} color={Colors.text} />
          <Text style={styles.backText}>Guided Meditation</Text>
        </TouchableOpacity>

        {/* Active Player */}
        {selected && (
          <View style={[styles.playerCard, { borderColor: selected.color + '55' }]}>
            <Text style={[styles.playerCategory, { color: selected.color }]}>{selected.level}</Text>
            <Text style={styles.playerTitle}>{selected.title}</Text>

            {/* Animated Circle */}
            <View style={styles.circleWrapper}>
              <Animated.View style={[styles.ringOuter, { opacity: ringOpacity, borderColor: selected.color }]} />
              <Animated.View style={[styles.circleMain, { transform: [{ scale: pulseAnim }], backgroundColor: selected.color + '22', borderColor: selected.color + '55' }]}>
                <TouchableOpacity
                  style={[styles.playCircleBtn, { backgroundColor: playing ? 'rgba(255,255,255,0.1)' : selected.color + '33' }]}
                  onPress={() => setPlaying(!playing)}
                  activeOpacity={0.8}
                >
                  <Ionicons name={playing ? 'pause' : 'play'} size={36} color={selected.color} />
                </TouchableOpacity>
              </Animated.View>
            </View>

            <TimerDisplay seconds={time} />
            <Text style={styles.playerDuration}>{selected.duration} · {playing ? 'Meditating...' : 'Paused'}</Text>

            {/* Progress */}
            <View style={styles.progressBar}>
              <View style={[styles.progressFill, { width: `${progress * 100}%`, backgroundColor: selected.color }]} />
            </View>

            <View style={styles.playerControls}>
              <TouchableOpacity onPress={() => { setTime(0); setPlaying(false); }}>
                <Ionicons name="refresh" size={24} color={Colors.textSecondary} />
              </TouchableOpacity>
              <TouchableOpacity onPress={() => { setPlaying(false); setSelected(null); setTime(0); }}>
                <Ionicons name="stop-circle-outline" size={24} color={Colors.textSecondary} />
              </TouchableOpacity>
            </View>
          </View>
        )}

        {/* Session List */}
        <Text style={styles.sectionTitle}>{selected ? 'Other Sessions' : 'Choose a Meditation'}</Text>
        {MEDITATIONS.filter(m => !selected || m.id !== selected.id).map(m => (
          <TouchableOpacity
            key={m.id}
            style={[styles.sessionCard, { borderLeftColor: m.color, borderLeftWidth: 3 }]}
            onPress={() => handleSelect(m)}
            activeOpacity={0.8}
          >
            <View style={[styles.sessionIcon, { backgroundColor: m.color + '22' }]}>
              <Ionicons name="leaf" size={22} color={m.color} />
            </View>
            <View style={styles.sessionInfo}>
              <View style={styles.sessionMeta}>
                <Text style={[styles.levelBadge, { color: (LEVEL_COLORS as any)[m.level] || Colors.text }]}>{m.level}</Text>
                <Text style={styles.sessionDuration}>{m.duration}</Text>
              </View>
              <Text style={styles.sessionTitle}>{m.title}</Text>
              <Text style={styles.sessionDesc} numberOfLines={1}>{m.description}</Text>
            </View>
            <Ionicons name="play-circle" size={30} color={m.color} />
          </TouchableOpacity>
        ))}

        {/* Tips */}
        <View style={styles.tipsCard}>
          <View style={styles.tipsHeader}>
            <Ionicons name="bulb" size={20} color={Colors.accentLight} />
            <Text style={styles.tipsTitle}>Meditation Tips</Text>
          </View>
          {[
            'Find a quiet, comfortable position',
            'Close your eyes and breathe naturally',
            'Let thoughts pass without attachment',
            'Consistency matters more than duration',
          ].map(tip => (
            <View key={tip} style={styles.tipRow}>
              <View style={styles.tipDot} />
              <Text style={styles.tipText}>{tip}</Text>
            </View>
          ))}
        </View>
      </ScrollView>
    </GradientBackground>
  );
}

const styles = StyleSheet.create({
  scroll: { flex: 1 },
  content: { paddingHorizontal: 16 },
  backBtn: { flexDirection: 'row', alignItems: 'center', gap: 8, marginBottom: 24 },
  backText: { fontFamily: 'Inter_700Bold', fontSize: 20, color: Colors.text },
  playerCard: { backgroundColor: Colors.card, borderRadius: 20, borderWidth: 1, padding: 24, marginBottom: 24, alignItems: 'center', gap: 12 },
  playerCategory: { fontFamily: 'Inter_500Medium', fontSize: 12, textTransform: 'uppercase', letterSpacing: 1 },
  playerTitle: { fontFamily: 'Inter_700Bold', fontSize: 26, color: Colors.text, textAlign: 'center' },
  circleWrapper: { width: 180, height: 180, alignItems: 'center', justifyContent: 'center', marginVertical: 8 },
  ringOuter: { position: 'absolute', width: 180, height: 180, borderRadius: 90, borderWidth: 2 },
  circleMain: { width: 150, height: 150, borderRadius: 75, borderWidth: 2, alignItems: 'center', justifyContent: 'center' },
  playCircleBtn: { width: 90, height: 90, borderRadius: 45, alignItems: 'center', justifyContent: 'center' },
  timerText: { fontFamily: 'Inter_700Bold', fontSize: 40, color: Colors.text, letterSpacing: 2 },
  playerDuration: { fontFamily: 'Inter_400Regular', fontSize: 13, color: Colors.textSecondary },
  progressBar: { width: '100%', height: 4, backgroundColor: Colors.cardBorder, borderRadius: 2 },
  progressFill: { height: 4, borderRadius: 2 },
  playerControls: { flexDirection: 'row', gap: 32 },
  sectionTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 17, color: Colors.text, marginBottom: 14 },
  sessionCard: { flexDirection: 'row', alignItems: 'center', backgroundColor: Colors.card, borderRadius: 16, borderWidth: 1, borderColor: Colors.cardBorder, padding: 14, marginBottom: 12, gap: 14 },
  sessionIcon: { width: 48, height: 48, borderRadius: 24, alignItems: 'center', justifyContent: 'center' },
  sessionInfo: { flex: 1 },
  sessionMeta: { flexDirection: 'row', justifyContent: 'space-between', marginBottom: 4 },
  levelBadge: { fontFamily: 'Inter_500Medium', fontSize: 11 },
  sessionDuration: { fontFamily: 'Inter_400Regular', fontSize: 11, color: Colors.textMuted },
  sessionTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 15, color: Colors.text, marginBottom: 3 },
  sessionDesc: { fontFamily: 'Inter_400Regular', fontSize: 12, color: Colors.textSecondary },
  tipsCard: { backgroundColor: 'rgba(201,168,76,0.1)', borderRadius: 16, borderWidth: 1, borderColor: 'rgba(201,168,76,0.2)', padding: 18, marginTop: 4, marginBottom: 16 },
  tipsHeader: { flexDirection: 'row', alignItems: 'center', gap: 10, marginBottom: 14 },
  tipsTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 15, color: Colors.accentLight },
  tipRow: { flexDirection: 'row', alignItems: 'flex-start', gap: 12, marginBottom: 10 },
  tipDot: { width: 6, height: 6, borderRadius: 3, backgroundColor: Colors.accentLight, marginTop: 6 },
  tipText: { flex: 1, fontFamily: 'Inter_400Regular', fontSize: 14, color: Colors.textSecondary, lineHeight: 21 },
});

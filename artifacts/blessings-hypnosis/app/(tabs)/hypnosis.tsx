import React, { useState, useRef, useEffect } from 'react';
import {
  View, Text, StyleSheet, ScrollView, TouchableOpacity,
  Platform, Animated, Modal,
} from 'react-native';
import { Ionicons } from '@expo/vector-icons';
import { useSafeAreaInsets } from 'react-native-safe-area-context';
import { GradientBackground } from '@/components/GradientBackground';
import { Colors } from '@/constants/colors';
import { HYPNOSIS_SESSIONS } from '@/utils/astrology';

const WEB_TOP = Platform.OS === 'web' ? 67 : 0;
const WEB_BOTTOM = Platform.OS === 'web' ? 34 : 0;

function BreathingCircle({ isActive }: { isActive: boolean }) {
  const scale = useRef(new Animated.Value(1)).current;
  const opacity = useRef(new Animated.Value(0.6)).current;
  const phase = useRef<'inhale' | 'hold' | 'exhale'>('inhale');
  const [phaseLabel, setPhaseLabel] = useState('Tap to Begin');

  useEffect(() => {
    if (!isActive) {
      scale.setValue(1);
      opacity.setValue(0.6);
      setPhaseLabel('Tap to Begin');
      return;
    }

    let running = true;
    const breathCycle = async () => {
      while (running) {
        setPhaseLabel('Breathe In...');
        await new Promise(resolve => {
          Animated.parallel([
            Animated.timing(scale, { toValue: 1.4, duration: 4000, useNativeDriver: true }),
            Animated.timing(opacity, { toValue: 1, duration: 4000, useNativeDriver: true }),
          ]).start(resolve);
        });
        if (!running) break;
        setPhaseLabel('Hold...');
        await new Promise(resolve => setTimeout(resolve, 2000));
        if (!running) break;
        setPhaseLabel('Breathe Out...');
        await new Promise(resolve => {
          Animated.parallel([
            Animated.timing(scale, { toValue: 1, duration: 4000, useNativeDriver: true }),
            Animated.timing(opacity, { toValue: 0.6, duration: 4000, useNativeDriver: true }),
          ]).start(resolve);
        });
        if (!running) break;
        setPhaseLabel('Rest...');
        await new Promise(resolve => setTimeout(resolve, 2000));
      }
    };
    breathCycle();
    return () => { running = false; };
  }, [isActive]);

  return (
    <View style={styles.breatheContainer}>
      <Animated.View style={[styles.breatheOuter, { transform: [{ scale }], opacity }]}>
        <Animated.View style={styles.breatheInner}>
          <Text style={styles.breathePhase}>{phaseLabel}</Text>
        </Animated.View>
      </Animated.View>
    </View>
  );
}

function SessionModal({ session, onClose }: { session: typeof HYPNOSIS_SESSIONS[0]; onClose: () => void }) {
  const [playing, setPlaying] = useState(false);
  const [time, setTime] = useState(0);
  const duration = parseInt(session.duration.split(' ')[0]) * 60;

  useEffect(() => {
    let timer: ReturnType<typeof setInterval> | null = null;
    if (playing && time < duration) {
      timer = setInterval(() => setTime(t => t + 1), 1000);
    }
    return () => { if (timer) clearInterval(timer); };
  }, [playing, time, duration]);

  const progress = duration > 0 ? time / duration : 0;
  const formatTime = (s: number) => `${Math.floor(s / 60).toString().padStart(2, '0')}:${(s % 60).toString().padStart(2, '0')}`;

  return (
    <Modal animationType="slide" transparent onRequestClose={onClose}>
      <View style={styles.modalOverlay}>
        <View style={styles.modalContent}>
          <TouchableOpacity style={styles.modalClose} onPress={() => { setPlaying(false); onClose(); }}>
            <Ionicons name="close" size={24} color={Colors.textSecondary} />
          </TouchableOpacity>
          <View style={[styles.modalIconCircle, { backgroundColor: session.color + '22' }]}>
            <Ionicons name="radio-button-on" size={40} color={session.color} />
          </View>
          <Text style={styles.modalCategory}>{session.category}</Text>
          <Text style={styles.modalTitle}>{session.title}</Text>
          <Text style={styles.modalDesc}>{session.description}</Text>

          <BreathingCircle isActive={playing} />

          {/* Progress Bar */}
          <View style={styles.progressBar}>
            <View style={[styles.progressFill, { width: `${progress * 100}%`, backgroundColor: session.color }]} />
          </View>
          <View style={styles.timeRow}>
            <Text style={styles.timeText}>{formatTime(time)}</Text>
            <Text style={styles.timeText}>{session.duration}</Text>
          </View>

          <View style={styles.playerControls}>
            <TouchableOpacity style={styles.controlBtn} onPress={() => setTime(0)}>
              <Ionicons name="play-skip-back" size={26} color={Colors.textSecondary} />
            </TouchableOpacity>
            <TouchableOpacity
              style={[styles.playBtn, { backgroundColor: session.color }]}
              onPress={() => setPlaying(!playing)}
            >
              <Ionicons name={playing ? 'pause' : 'play'} size={32} color={Colors.text} />
            </TouchableOpacity>
            <TouchableOpacity style={styles.controlBtn} onPress={() => setTime(duration)}>
              <Ionicons name="play-skip-forward" size={26} color={Colors.textSecondary} />
            </TouchableOpacity>
          </View>
        </View>
      </View>
    </Modal>
  );
}

export default function HypnosisScreen() {
  const insets = useSafeAreaInsets();
  const [activeSession, setActiveSession] = useState<typeof HYPNOSIS_SESSIONS[0] | null>(null);
  const [breathingMode, setBreathingMode] = useState(false);

  return (
    <GradientBackground>
      <ScrollView
        style={styles.scroll}
        contentContainerStyle={[
          styles.content,
          { paddingTop: insets.top + WEB_TOP + 16, paddingBottom: insets.bottom + WEB_BOTTOM + 100 }
        ]}
        showsVerticalScrollIndicator={false}
      >
        <Text style={styles.pageTitle}>Hypnosis</Text>
        <Text style={styles.pageSubtitle}>Transform your mind, transform your life</Text>

        {/* Breathing Exercise Banner */}
        <TouchableOpacity
          style={[styles.breathBanner, breathingMode && { borderColor: Colors.teal }]}
          onPress={() => setBreathingMode(!breathingMode)}
          activeOpacity={0.85}
        >
          <View style={styles.breathBannerLeft}>
            <Ionicons name="partly-sunny" size={24} color={Colors.teal} />
            <View>
              <Text style={styles.breathBannerTitle}>Breathing Exercise</Text>
              <Text style={styles.breathBannerSub}>Calm your mind in 4 minutes</Text>
            </View>
          </View>
          <View style={[styles.breathToggle, breathingMode && { backgroundColor: Colors.teal }]}>
            <Text style={styles.breathToggleText}>{breathingMode ? 'Stop' : 'Start'}</Text>
          </View>
        </TouchableOpacity>

        {breathingMode && (
          <View style={styles.breathSection}>
            <BreathingCircle isActive={breathingMode} />
          </View>
        )}

        {/* Sessions */}
        <Text style={styles.sectionTitle}>Hypnosis Sessions</Text>
        {HYPNOSIS_SESSIONS.map(session => (
          <TouchableOpacity
            key={session.id}
            style={[styles.sessionCard, { borderLeftColor: session.color, borderLeftWidth: 3 }]}
            onPress={() => setActiveSession(session)}
            activeOpacity={0.8}
          >
            <View style={[styles.sessionIcon, { backgroundColor: session.color + '22' }]}>
              <Ionicons name="radio-button-on" size={22} color={session.color} />
            </View>
            <View style={styles.sessionInfo}>
              <View style={styles.sessionMeta}>
                <Text style={[styles.sessionCategory, { color: session.color }]}>{session.category}</Text>
                <View style={styles.durationBadge}>
                  <Ionicons name="time-outline" size={11} color={Colors.textMuted} />
                  <Text style={styles.durationText}>{session.duration}</Text>
                </View>
              </View>
              <Text style={styles.sessionTitle}>{session.title}</Text>
              <Text style={styles.sessionDesc} numberOfLines={2}>{session.description}</Text>
            </View>
            <TouchableOpacity
              style={[styles.playIconBtn, { backgroundColor: session.color + '22' }]}
              onPress={() => setActiveSession(session)}
            >
              <Ionicons name="play" size={18} color={session.color} />
            </TouchableOpacity>
          </TouchableOpacity>
        ))}

        {/* Benefits */}
        <Text style={styles.sectionTitle}>Benefits of Hypnotherapy</Text>
        <View style={styles.benefitsGrid}>
          {[
            { icon: 'brain', label: 'Reprograms\nSubconscious', color: '#7B2FBE' },
            { icon: 'heart', label: 'Reduces\nAnxiety', color: '#FF6B6B' },
            { icon: 'moon', label: 'Improves\nSleep', color: '#00C9B1' },
            { icon: 'trophy', label: 'Builds\nConfidence', color: '#C9A84C' },
          ].map(b => (
            <View key={b.label} style={styles.benefitCard}>
              <Ionicons name={b.icon as any} size={26} color={b.color} />
              <Text style={styles.benefitText}>{b.label}</Text>
            </View>
          ))}
        </View>
      </ScrollView>

      {activeSession && (
        <SessionModal session={activeSession} onClose={() => setActiveSession(null)} />
      )}
    </GradientBackground>
  );
}

const styles = StyleSheet.create({
  scroll: { flex: 1 },
  content: { paddingHorizontal: 16 },
  pageTitle: { fontFamily: 'Inter_700Bold', fontSize: 28, color: Colors.text, marginBottom: 4 },
  pageSubtitle: { fontFamily: 'Inter_400Regular', fontSize: 14, color: Colors.textSecondary, marginBottom: 20 },
  breathBanner: {
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'space-between',
    backgroundColor: 'rgba(0,201,177,0.1)',
    borderRadius: 16,
    borderWidth: 1,
    borderColor: 'rgba(0,201,177,0.25)',
    padding: 16,
    marginBottom: 16,
  },
  breathBannerLeft: { flexDirection: 'row', alignItems: 'center', gap: 12 },
  breathBannerTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 15, color: Colors.text },
  breathBannerSub: { fontFamily: 'Inter_400Regular', fontSize: 12, color: Colors.textSecondary },
  breathToggle: { backgroundColor: Colors.card, borderRadius: 10, paddingHorizontal: 16, paddingVertical: 8, borderWidth: 1, borderColor: Colors.teal },
  breathToggleText: { fontFamily: 'Inter_600SemiBold', fontSize: 13, color: Colors.teal },
  breathSection: { marginBottom: 24, alignItems: 'center' },
  breatheContainer: { alignItems: 'center', justifyContent: 'center', height: 220 },
  breatheOuter: {
    width: 160,
    height: 160,
    borderRadius: 80,
    backgroundColor: 'rgba(0,201,177,0.15)',
    alignItems: 'center',
    justifyContent: 'center',
    borderWidth: 2,
    borderColor: 'rgba(0,201,177,0.4)',
  },
  breatheInner: {
    width: 110,
    height: 110,
    borderRadius: 55,
    backgroundColor: 'rgba(0,201,177,0.25)',
    alignItems: 'center',
    justifyContent: 'center',
  },
  breathePhase: { fontFamily: 'Inter_500Medium', fontSize: 14, color: Colors.teal, textAlign: 'center' },
  sectionTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 17, color: Colors.text, marginBottom: 14, marginTop: 8 },
  sessionCard: {
    flexDirection: 'row',
    alignItems: 'center',
    backgroundColor: Colors.card,
    borderRadius: 16,
    borderWidth: 1,
    borderColor: Colors.cardBorder,
    padding: 14,
    marginBottom: 12,
    gap: 14,
  },
  sessionIcon: { width: 48, height: 48, borderRadius: 24, alignItems: 'center', justifyContent: 'center' },
  sessionInfo: { flex: 1 },
  sessionMeta: { flexDirection: 'row', justifyContent: 'space-between', alignItems: 'center', marginBottom: 4 },
  sessionCategory: { fontFamily: 'Inter_500Medium', fontSize: 11, textTransform: 'uppercase', letterSpacing: 0.6 },
  durationBadge: { flexDirection: 'row', alignItems: 'center', gap: 3 },
  durationText: { fontFamily: 'Inter_400Regular', fontSize: 11, color: Colors.textMuted },
  sessionTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 15, color: Colors.text, marginBottom: 4 },
  sessionDesc: { fontFamily: 'Inter_400Regular', fontSize: 12, color: Colors.textSecondary, lineHeight: 18 },
  playIconBtn: { width: 40, height: 40, borderRadius: 20, alignItems: 'center', justifyContent: 'center' },
  benefitsGrid: { flexDirection: 'row', flexWrap: 'wrap', gap: 10 },
  benefitCard: {
    width: '48%',
    backgroundColor: Colors.card,
    borderRadius: 14,
    borderWidth: 1,
    borderColor: Colors.cardBorder,
    padding: 18,
    alignItems: 'center',
    gap: 10,
  },
  benefitText: { fontFamily: 'Inter_500Medium', fontSize: 13, color: Colors.text, textAlign: 'center', lineHeight: 18 },
  modalOverlay: { flex: 1, backgroundColor: 'rgba(0,0,0,0.85)', justifyContent: 'flex-end' },
  modalContent: {
    backgroundColor: Colors.primary,
    borderTopLeftRadius: 28,
    borderTopRightRadius: 28,
    padding: 28,
    alignItems: 'center',
    borderTopWidth: 1,
    borderTopColor: Colors.cardBorder,
  },
  modalClose: { position: 'absolute', top: 20, right: 20 },
  modalIconCircle: { width: 80, height: 80, borderRadius: 40, alignItems: 'center', justifyContent: 'center', marginBottom: 12 },
  modalCategory: { fontFamily: 'Inter_500Medium', fontSize: 12, color: Colors.accentLight, textTransform: 'uppercase', letterSpacing: 1, marginBottom: 6 },
  modalTitle: { fontFamily: 'Inter_700Bold', fontSize: 24, color: Colors.text, marginBottom: 10, textAlign: 'center' },
  modalDesc: { fontFamily: 'Inter_400Regular', fontSize: 14, color: Colors.textSecondary, textAlign: 'center', lineHeight: 22, marginBottom: 16 },
  progressBar: { width: '100%', height: 4, backgroundColor: Colors.cardBorder, borderRadius: 2, marginBottom: 8 },
  progressFill: { height: 4, borderRadius: 2 },
  timeRow: { flexDirection: 'row', justifyContent: 'space-between', width: '100%', marginBottom: 24 },
  timeText: { fontFamily: 'Inter_500Medium', fontSize: 13, color: Colors.textSecondary },
  playerControls: { flexDirection: 'row', alignItems: 'center', gap: 28 },
  controlBtn: { padding: 8 },
  playBtn: { width: 70, height: 70, borderRadius: 35, alignItems: 'center', justifyContent: 'center' },
});

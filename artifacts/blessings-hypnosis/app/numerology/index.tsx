import React from 'react';
import {
  View, Text, StyleSheet, ScrollView, TouchableOpacity, Platform,
} from 'react-native';
import { Ionicons } from '@expo/vector-icons';
import { router } from 'expo-router';
import { useSafeAreaInsets } from 'react-native-safe-area-context';
import { GradientBackground } from '@/components/GradientBackground';
import { Colors } from '@/constants/colors';
import { useUser } from '@/context/UserContext';
import { NUMEROLOGY_MEANINGS } from '@/utils/astrology';

const WEB_TOP = Platform.OS === 'web' ? 67 : 0;
const WEB_BOTTOM = Platform.OS === 'web' ? 34 : 0;

const NUM_COLORS = ['#FF6B6B', '#FF9800', '#FFD700', '#4CAF50', '#2196F3', '#9C27B0', '#00BCD4', '#FF5722', '#607D8B'];

export default function NumerologyScreen() {
  const insets = useSafeAreaInsets();
  const { profile, isProfileComplete } = useUser();
  const lifePathNum = profile.numerologyNumber || 1;
  const meaning = NUMEROLOGY_MEANINGS[lifePathNum] || NUMEROLOGY_MEANINGS[1];
  const numColor = NUM_COLORS[(lifePathNum - 1) % NUM_COLORS.length];

  // Name number calculation (simplified)
  const getNameNumber = (name: string): number => {
    const values: Record<string, number> = {
      a: 1, b: 2, c: 3, d: 4, e: 5, f: 6, g: 7, h: 8, i: 9,
      j: 1, k: 2, l: 3, m: 4, n: 5, o: 6, p: 7, q: 8, r: 9,
      s: 1, t: 2, u: 3, v: 4, w: 5, x: 6, y: 7, z: 8,
    };
    let sum = name.toLowerCase().replace(/[^a-z]/g, '').split('').reduce((acc, c) => acc + (values[c] || 0), 0);
    while (sum > 9 && sum !== 11 && sum !== 22) {
      sum = sum.toString().split('').reduce((acc, d) => acc + parseInt(d, 10), 0);
    }
    return sum || 1;
  };

  const nameNum = profile.name ? getNameNumber(profile.name) : 5;
  const destinyNum = lifePathNum % 9 || 9;

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
          <Text style={styles.backText}>Numerology</Text>
        </TouchableOpacity>

        {!isProfileComplete && (
          <View style={styles.warnCard}>
            <Ionicons name="information-circle" size={22} color={Colors.accentLight} />
            <Text style={styles.warnText}>Add your birth date in Profile for a personalized reading</Text>
            <TouchableOpacity onPress={() => router.push('/profile')} style={styles.warnBtn}>
              <Text style={styles.warnBtnText}>Go</Text>
            </TouchableOpacity>
          </View>
        )}

        {/* Life Path Hero */}
        <View style={[styles.heroCard, { borderColor: numColor + '55' }]}>
          <View style={[styles.heroNumCircle, { backgroundColor: numColor + '22', borderColor: numColor + '55' }]}>
            <Text style={[styles.heroNum, { color: numColor }]}>{lifePathNum}</Text>
          </View>
          <Text style={styles.heroTitle}>{meaning.title}</Text>
          <Text style={styles.heroSub}>Life Path Number</Text>
          <Text style={styles.heroDesc}>{meaning.description}</Text>
        </View>

        {/* Three Core Numbers */}
        <Text style={styles.sectionTitle}>Your Core Numbers</Text>
        <View style={styles.coreGrid}>
          {[
            { num: lifePathNum, label: 'Life Path', desc: 'Your purpose & journey', color: numColor },
            { num: nameNum, label: 'Expression', desc: 'Your talents & abilities', color: Colors.teal },
            { num: destinyNum, label: 'Destiny', desc: 'What you must achieve', color: Colors.violetLight },
          ].map(item => (
            <View key={item.label} style={[styles.coreCard, { borderTopColor: item.color, borderTopWidth: 3 }]}>
              <Text style={[styles.coreNum, { color: item.color }]}>{item.num}</Text>
              <Text style={styles.coreLabel}>{item.label}</Text>
              <Text style={styles.coreDesc}>{item.desc}</Text>
            </View>
          ))}
        </View>

        {/* Traits */}
        <View style={styles.traitsCard}>
          <Text style={styles.traitsTitle}>Key Traits</Text>
          <View style={styles.traitsRow}>
            {meaning.traits.map(trait => (
              <View key={trait} style={[styles.traitBadge, { backgroundColor: numColor + '22', borderColor: numColor + '44' }]}>
                <Text style={[styles.traitText, { color: numColor }]}>{trait}</Text>
              </View>
            ))}
          </View>
        </View>

        {/* Career & Love */}
        {[
          { icon: 'briefcase', title: 'Career Path', text: meaning.career, color: Colors.accentLight },
          { icon: 'heart', title: 'Love & Relationships', text: meaning.love, color: '#FF6B6B' },
        ].map(item => (
          <View key={item.title} style={styles.aspectCard}>
            <View style={styles.aspectHeader}>
              <View style={[styles.aspectIcon, { backgroundColor: item.color + '22' }]}>
                <Ionicons name={item.icon as any} size={20} color={item.color} />
              </View>
              <Text style={styles.aspectTitle}>{item.title}</Text>
            </View>
            <Text style={styles.aspectText}>{item.text}</Text>
          </View>
        ))}

        {/* Number Grid */}
        <Text style={styles.sectionTitle}>Explore All Numbers</Text>
        <View style={styles.numGrid}>
          {Object.entries(NUMEROLOGY_MEANINGS).map(([num, data]) => (
            <View key={num} style={[styles.numGridCard, parseInt(num) === lifePathNum && { borderColor: numColor, backgroundColor: numColor + '15' }]}>
              <Text style={[styles.numGridNum, { color: NUM_COLORS[(parseInt(num) - 1) % NUM_COLORS.length] }]}>{num}</Text>
              <Text style={styles.numGridTitle}>{data.title}</Text>
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
  warnCard: { flexDirection: 'row', alignItems: 'center', gap: 10, backgroundColor: 'rgba(201,168,76,0.1)', borderRadius: 14, borderWidth: 1, borderColor: 'rgba(201,168,76,0.25)', padding: 14, marginBottom: 20 },
  warnText: { flex: 1, fontFamily: 'Inter_400Regular', fontSize: 13, color: Colors.textSecondary },
  warnBtn: { backgroundColor: Colors.accentLight, borderRadius: 8, paddingHorizontal: 14, paddingVertical: 8 },
  warnBtnText: { fontFamily: 'Inter_600SemiBold', fontSize: 13, color: Colors.primaryDark },
  heroCard: { alignItems: 'center', backgroundColor: Colors.card, borderRadius: 20, borderWidth: 1, padding: 28, marginBottom: 24, gap: 10 },
  heroNumCircle: { width: 100, height: 100, borderRadius: 50, alignItems: 'center', justifyContent: 'center', borderWidth: 2 },
  heroNum: { fontFamily: 'Inter_700Bold', fontSize: 52 },
  heroTitle: { fontFamily: 'Inter_700Bold', fontSize: 26, color: Colors.text },
  heroSub: { fontFamily: 'Inter_500Medium', fontSize: 13, color: Colors.textMuted },
  heroDesc: { fontFamily: 'Inter_400Regular', fontSize: 14, color: Colors.textSecondary, textAlign: 'center', lineHeight: 22 },
  sectionTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 17, color: Colors.text, marginBottom: 14 },
  coreGrid: { flexDirection: 'row', gap: 10, marginBottom: 20 },
  coreCard: { flex: 1, backgroundColor: Colors.card, borderRadius: 14, borderWidth: 1, borderColor: Colors.cardBorder, padding: 14, alignItems: 'center', gap: 4 },
  coreNum: { fontFamily: 'Inter_700Bold', fontSize: 32 },
  coreLabel: { fontFamily: 'Inter_600SemiBold', fontSize: 13, color: Colors.text },
  coreDesc: { fontFamily: 'Inter_400Regular', fontSize: 11, color: Colors.textMuted, textAlign: 'center' },
  traitsCard: { backgroundColor: Colors.card, borderRadius: 16, borderWidth: 1, borderColor: Colors.cardBorder, padding: 18, marginBottom: 14 },
  traitsTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 15, color: Colors.text, marginBottom: 14 },
  traitsRow: { flexDirection: 'row', flexWrap: 'wrap', gap: 8 },
  traitBadge: { borderWidth: 1, borderRadius: 20, paddingHorizontal: 14, paddingVertical: 6 },
  traitText: { fontFamily: 'Inter_500Medium', fontSize: 13 },
  aspectCard: { backgroundColor: Colors.card, borderRadius: 16, borderWidth: 1, borderColor: Colors.cardBorder, padding: 18, marginBottom: 12 },
  aspectHeader: { flexDirection: 'row', alignItems: 'center', gap: 12, marginBottom: 12 },
  aspectIcon: { width: 40, height: 40, borderRadius: 20, alignItems: 'center', justifyContent: 'center' },
  aspectTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 16, color: Colors.text },
  aspectText: { fontFamily: 'Inter_400Regular', fontSize: 14, color: Colors.textSecondary, lineHeight: 22 },
  numGrid: { flexDirection: 'row', flexWrap: 'wrap', gap: 10, marginBottom: 20 },
  numGridCard: { width: '30%', backgroundColor: Colors.card, borderRadius: 14, borderWidth: 1, borderColor: Colors.cardBorder, padding: 14, alignItems: 'center', gap: 4 },
  numGridNum: { fontFamily: 'Inter_700Bold', fontSize: 26 },
  numGridTitle: { fontFamily: 'Inter_500Medium', fontSize: 11, color: Colors.textSecondary, textAlign: 'center' },
});

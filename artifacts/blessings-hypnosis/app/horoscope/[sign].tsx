import React, { useRef, useEffect } from 'react';
import {
  View, Text, StyleSheet, ScrollView, TouchableOpacity,
  Animated, Platform,
} from 'react-native';
import { Ionicons } from '@expo/vector-icons';
import { router, useLocalSearchParams } from 'expo-router';
import { useSafeAreaInsets } from 'react-native-safe-area-context';
import { GradientBackground } from '@/components/GradientBackground';
import { Colors } from '@/constants/colors';
import { ZODIAC_SIGNS, HOROSCOPE_DATA, ZodiacSign } from '@/utils/astrology';

const WEB_TOP = Platform.OS === 'web' ? 67 : 0;
const WEB_BOTTOM = Platform.OS === 'web' ? 34 : 0;

function StarRating({ rating }: { rating: number }) {
  return (
    <View style={{ flexDirection: 'row', gap: 4 }}>
      {[1, 2, 3, 4, 5].map(i => (
        <Ionicons key={i} name={i <= rating ? 'star' : 'star-outline'} size={16} color={Colors.accentLight} />
      ))}
    </View>
  );
}

export default function SignDetailScreen() {
  const { sign: signParam } = useLocalSearchParams<{ sign: string }>();
  const insets = useSafeAreaInsets();
  const fadeAnim = useRef(new Animated.Value(0)).current;
  const slideAnim = useRef(new Animated.Value(30)).current;

  const sign = ZODIAC_SIGNS.find(z => z.sign === signParam) || ZODIAC_SIGNS[0];
  const horoscope = HOROSCOPE_DATA[sign.sign as ZodiacSign]?.today;

  useEffect(() => {
    Animated.parallel([
      Animated.timing(fadeAnim, { toValue: 1, duration: 600, useNativeDriver: true }),
      Animated.timing(slideAnim, { toValue: 0, duration: 600, useNativeDriver: true }),
    ]).start();
  }, []);

  if (!horoscope) return null;

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
        {/* Back */}
        <TouchableOpacity style={styles.backBtn} onPress={() => router.back()}>
          <Ionicons name="arrow-back" size={22} color={Colors.text} />
          <Text style={styles.backText}>Horoscope</Text>
        </TouchableOpacity>

        {/* Hero */}
        <Animated.View style={[styles.hero, { opacity: fadeAnim, transform: [{ translateY: slideAnim }] }]}>
          <View style={[styles.signCircle, { backgroundColor: sign.color + '22', borderColor: sign.color + '55' }]}>
            <Text style={[styles.signSymbol, { color: sign.color }]}>{sign.symbol}</Text>
          </View>
          <Text style={styles.signName}>{sign.name}</Text>
          <Text style={styles.signDates}>{sign.dates}</Text>
          <View style={styles.signMeta}>
            <View style={[styles.badge, { backgroundColor: sign.color + '22' }]}>
              <Text style={[styles.badgeText, { color: sign.color }]}>{sign.element}</Text>
            </View>
            <View style={[styles.badge, { backgroundColor: sign.color + '22' }]}>
              <Text style={[styles.badgeText, { color: sign.color }]}>{sign.planet}</Text>
            </View>
          </View>
          <StarRating rating={horoscope.rating} />
        </Animated.View>

        {/* Overall Reading */}
        <Animated.View style={[styles.card, { opacity: fadeAnim }]}>
          <View style={styles.cardHeader}>
            <Ionicons name="sparkles" size={20} color={Colors.accentLight} />
            <Text style={styles.cardTitle}>Today's Overall Reading</Text>
          </View>
          <Text style={styles.cardText}>{horoscope.overall}</Text>
        </Animated.View>

        {/* Aspect Cards */}
        {[
          { icon: 'heart', label: 'Love & Relationships', color: '#FF6B6B', text: horoscope.love },
          { icon: 'briefcase', label: 'Career & Finance', color: Colors.accentLight, text: horoscope.career },
          { icon: 'fitness', label: 'Health & Wellness', color: Colors.teal, text: horoscope.health },
        ].map(aspect => (
          <View key={aspect.label} style={styles.aspectCard}>
            <View style={styles.aspectHeader}>
              <View style={[styles.aspectIcon, { backgroundColor: aspect.color + '22' }]}>
                <Ionicons name={aspect.icon as any} size={22} color={aspect.color} />
              </View>
              <Text style={styles.aspectTitle}>{aspect.label}</Text>
            </View>
            <Text style={styles.cardText}>{aspect.text}</Text>
          </View>
        ))}

        {/* Lucky Info */}
        <View style={styles.luckyCard}>
          <Text style={styles.luckyTitle}>Lucky Elements for Today</Text>
          <View style={styles.luckyGrid}>
            <View style={styles.luckyItem}>
              <Ionicons name="dice" size={22} color={Colors.accentLight} />
              <Text style={styles.luckyLabel}>Lucky Number</Text>
              <Text style={styles.luckyValue}>{horoscope.luckyNumber}</Text>
            </View>
            <View style={styles.luckyItem}>
              <Ionicons name="color-palette" size={22} color={Colors.teal} />
              <Text style={styles.luckyLabel}>Lucky Color</Text>
              <Text style={styles.luckyValue}>{horoscope.lucky.split(', ')[1]}</Text>
            </View>
            <View style={styles.luckyItem}>
              <Ionicons name="compass" size={22} color={Colors.violetLight} />
              <Text style={styles.luckyLabel}>Direction</Text>
              <Text style={styles.luckyValue}>{horoscope.lucky.split(', ')[2]}</Text>
            </View>
          </View>
        </View>

        {/* Compatibility Quick */}
        <View style={styles.compatCard}>
          <View style={styles.compatHeader}>
            <Ionicons name="heart-half" size={20} color={Colors.violetLight} />
            <Text style={styles.compatTitle}>Best Compatibility</Text>
          </View>
          {sign.element === 'Fire' && <Text style={styles.compatText}>Leo, Sagittarius, Aries are your most harmonious cosmic partners, sharing your passionate fire element.</Text>}
          {sign.element === 'Earth' && <Text style={styles.compatText}>Taurus, Virgo, Capricorn resonate deeply with your grounded nature, building lasting foundations together.</Text>}
          {sign.element === 'Air' && <Text style={styles.compatText}>Gemini, Libra, Aquarius align beautifully with your intellectual air energy, creating stimulating partnerships.</Text>}
          {sign.element === 'Water' && <Text style={styles.compatText}>Cancer, Scorpio, Pisces flow naturally with your emotional depth, creating profound and soulful bonds.</Text>}
        </View>
      </ScrollView>
    </GradientBackground>
  );
}

const styles = StyleSheet.create({
  scroll: { flex: 1 },
  content: { paddingHorizontal: 16 },
  backBtn: { flexDirection: 'row', alignItems: 'center', gap: 8, marginBottom: 24 },
  backText: { fontFamily: 'Inter_500Medium', fontSize: 16, color: Colors.text },
  hero: { alignItems: 'center', marginBottom: 28, gap: 10 },
  signCircle: { width: 110, height: 110, borderRadius: 55, alignItems: 'center', justifyContent: 'center', borderWidth: 2 },
  signSymbol: { fontSize: 58 },
  signName: { fontFamily: 'Inter_700Bold', fontSize: 32, color: Colors.text },
  signDates: { fontFamily: 'Inter_400Regular', fontSize: 14, color: Colors.textSecondary },
  signMeta: { flexDirection: 'row', gap: 10 },
  badge: { paddingHorizontal: 14, paddingVertical: 6, borderRadius: 20 },
  badgeText: { fontFamily: 'Inter_600SemiBold', fontSize: 13 },
  card: {
    backgroundColor: Colors.card,
    borderRadius: 16,
    borderWidth: 1,
    borderColor: Colors.cardBorder,
    padding: 18,
    marginBottom: 14,
  },
  cardHeader: { flexDirection: 'row', alignItems: 'center', gap: 10, marginBottom: 12 },
  cardTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 16, color: Colors.text },
  cardText: { fontFamily: 'Inter_400Regular', fontSize: 14, color: Colors.textSecondary, lineHeight: 22 },
  aspectCard: { backgroundColor: Colors.card, borderRadius: 16, borderWidth: 1, borderColor: Colors.cardBorder, padding: 18, marginBottom: 12 },
  aspectHeader: { flexDirection: 'row', alignItems: 'center', gap: 12, marginBottom: 12 },
  aspectIcon: { width: 42, height: 42, borderRadius: 21, alignItems: 'center', justifyContent: 'center' },
  aspectTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 16, color: Colors.text },
  luckyCard: { backgroundColor: 'rgba(201,168,76,0.1)', borderRadius: 16, borderWidth: 1, borderColor: 'rgba(201,168,76,0.25)', padding: 18, marginBottom: 14 },
  luckyTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 15, color: Colors.accentLight, marginBottom: 16 },
  luckyGrid: { flexDirection: 'row', justifyContent: 'space-around' },
  luckyItem: { alignItems: 'center', gap: 6 },
  luckyLabel: { fontFamily: 'Inter_400Regular', fontSize: 11, color: Colors.textMuted },
  luckyValue: { fontFamily: 'Inter_700Bold', fontSize: 16, color: Colors.text },
  compatCard: { backgroundColor: 'rgba(123,47,190,0.15)', borderRadius: 16, borderWidth: 1, borderColor: 'rgba(123,47,190,0.3)', padding: 18, marginBottom: 14 },
  compatHeader: { flexDirection: 'row', alignItems: 'center', gap: 10, marginBottom: 12 },
  compatTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 16, color: Colors.violetLight },
  compatText: { fontFamily: 'Inter_400Regular', fontSize: 14, color: Colors.textSecondary, lineHeight: 22 },
});

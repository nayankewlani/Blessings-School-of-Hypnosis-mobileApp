import React, { useRef, useEffect } from 'react';
import {
  View, Text, StyleSheet, ScrollView, TouchableOpacity,
  Animated, Platform, Dimensions,
} from 'react-native';
import { Ionicons, MaterialCommunityIcons } from '@expo/vector-icons';
import { router } from 'expo-router';
import { useSafeAreaInsets } from 'react-native-safe-area-context';
import { GradientBackground } from '@/components/GradientBackground';
import { Colors } from '@/constants/colors';
import { useUser } from '@/context/UserContext';
import { ZODIAC_SIGNS, PANCHANG_DATA } from '@/utils/astrology';

const { width } = Dimensions.get('window');

const WEB_TOP = Platform.OS === 'web' ? 67 : 0;
const WEB_BOTTOM = Platform.OS === 'web' ? 34 : 0;

function PulseOrb({ delay }: { delay: number }) {
  const scale = useRef(new Animated.Value(1)).current;
  const opacity = useRef(new Animated.Value(0.6)).current;
  useEffect(() => {
    const pulse = Animated.loop(
      Animated.sequence([
        Animated.delay(delay),
        Animated.parallel([
          Animated.timing(scale, { toValue: 1.15, duration: 2000, useNativeDriver: true }),
          Animated.timing(opacity, { toValue: 0.9, duration: 2000, useNativeDriver: true }),
        ]),
        Animated.parallel([
          Animated.timing(scale, { toValue: 1, duration: 2000, useNativeDriver: true }),
          Animated.timing(opacity, { toValue: 0.6, duration: 2000, useNativeDriver: true }),
        ]),
      ])
    );
    pulse.start();
    return () => pulse.stop();
  }, []);
  return (
    <Animated.View style={{ transform: [{ scale }], opacity }}>
      <View style={styles.heroSymbol}>
        <Text style={styles.heroSymbolText}>✦</Text>
      </View>
    </Animated.View>
  );
}

const QUICK_FEATURES = [
  { id: 'horoscope', label: 'Today', icon: 'planet' as const, color: '#C9A84C', tab: '/horoscope' },
  { id: 'kundali', label: 'Kundali', icon: 'compass' as const, color: '#7B2FBE', route: '/kundali/' },
  { id: 'tarot', label: 'Tarot', icon: 'diamond' as const, color: '#00C9B1', route: '/tarot/' },
  { id: 'numerology', label: 'Numerology', icon: 'calculator' as const, color: '#FF6B6B', route: '/numerology/' },
  { id: 'panchang', label: 'Panchang', icon: 'calendar' as const, color: '#4CAF50', route: '/panchang/' },
  { id: 'hypnosis', label: 'Hypnosis', icon: 'radio-button-on' as const, color: '#2196F3', tab: '/hypnosis' },
];

function QuickFeatureCard({ item }: { item: typeof QUICK_FEATURES[0] }) {
  const scale = useRef(new Animated.Value(1)).current;
  const handlePress = () => {
    Animated.sequence([
      Animated.timing(scale, { toValue: 0.94, duration: 80, useNativeDriver: true }),
      Animated.timing(scale, { toValue: 1, duration: 80, useNativeDriver: true }),
    ]).start(() => {
      if (item.tab) router.push(item.tab as any);
      else if (item.route) router.push(item.route as any);
    });
  };
  return (
    <Animated.View style={{ transform: [{ scale }] }}>
      <TouchableOpacity onPress={handlePress} style={styles.quickCard} activeOpacity={0.8}>
        <View style={[styles.quickIconCircle, { backgroundColor: item.color + '22' }]}>
          <Ionicons name={item.icon} size={26} color={item.color} />
        </View>
        <Text style={styles.quickLabel}>{item.label}</Text>
      </TouchableOpacity>
    </Animated.View>
  );
}

export default function HomeScreen() {
  const insets = useSafeAreaInsets();
  const { profile } = useUser();

  const greeting = () => {
    const h = new Date().getHours();
    if (h < 12) return 'Good Morning';
    if (h < 17) return 'Good Afternoon';
    return 'Good Evening';
  };

  const todaySign = profile.zodiacSign
    ? ZODIAC_SIGNS.find(z => z.sign === profile.zodiacSign)
    : null;

  const fadeAnim = useRef(new Animated.Value(0)).current;
  useEffect(() => {
    Animated.timing(fadeAnim, { toValue: 1, duration: 800, useNativeDriver: true }).start();
  }, []);

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
        {/* Header */}
        <Animated.View style={{ opacity: fadeAnim }}>
          <View style={styles.header}>
            <View>
              <Text style={styles.greeting}>{greeting()}</Text>
              <Text style={styles.appName}>Blessings School of Hypnosis</Text>
              {profile.name ? <Text style={styles.userName}>{profile.name}</Text> : null}
            </View>
            <TouchableOpacity onPress={() => router.push('/profile')} style={styles.avatarBtn}>
              <Ionicons name="person-circle" size={44} color={Colors.accentLight} />
            </TouchableOpacity>
          </View>
        </Animated.View>

        {/* Hero Banner */}
        <Animated.View style={[styles.heroBanner, { opacity: fadeAnim }]}>
          <View style={styles.heroOrbs}>
            <PulseOrb delay={0} />
            <PulseOrb delay={600} />
            <PulseOrb delay={1200} />
          </View>
          <Text style={styles.heroBannerTitle}>
            {todaySign ? `${todaySign.symbol} ${todaySign.name}` : 'Discover Your Destiny'}
          </Text>
          <Text style={styles.heroBannerSub}>
            {todaySign
              ? `${todaySign.element} Sign · ${todaySign.planet}`
              : 'Ancient wisdom meets modern consciousness'}
          </Text>
          <TouchableOpacity
            style={styles.heroBtn}
            onPress={() => router.push('/horoscope')}
            activeOpacity={0.8}
          >
            <Text style={styles.heroBtnText}>View Today's Horoscope</Text>
            <Ionicons name="arrow-forward" size={16} color={Colors.primaryDark} />
          </TouchableOpacity>
        </Animated.View>

        {/* Quick Access */}
        <Text style={styles.sectionTitle}>Quick Access</Text>
        <View style={styles.quickGrid}>
          {QUICK_FEATURES.map(item => (
            <QuickFeatureCard key={item.id} item={item} />
          ))}
        </View>

        {/* Today's Panchang */}
        <Text style={styles.sectionTitle}>Today's Panchang</Text>
        <View style={styles.panchangCard}>
          <View style={styles.panchangRow}>
            <View style={styles.panchangItem}>
              <Ionicons name="moon" size={18} color={Colors.accentLight} />
              <Text style={styles.panchangLabel}>Tithi</Text>
              <Text style={styles.panchangValue}>{PANCHANG_DATA.tithi.split(' (')[0]}</Text>
            </View>
            <View style={styles.panchangDivider} />
            <View style={styles.panchangItem}>
              <Ionicons name="star" size={18} color={Colors.teal} />
              <Text style={styles.panchangLabel}>Nakshatra</Text>
              <Text style={styles.panchangValue}>{PANCHANG_DATA.nakshatra}</Text>
            </View>
            <View style={styles.panchangDivider} />
            <View style={styles.panchangItem}>
              <Ionicons name="sunny" size={18} color={Colors.violetLight} />
              <Text style={styles.panchangLabel}>Yoga</Text>
              <Text style={styles.panchangValue}>{PANCHANG_DATA.yoga}</Text>
            </View>
          </View>
          <View style={styles.panchangSunRow}>
            <View style={styles.sunItem}>
              <Ionicons name="sunny-outline" size={16} color={Colors.gold} />
              <Text style={styles.sunText}>Rise: {PANCHANG_DATA.sunrise}</Text>
            </View>
            <View style={styles.sunItem}>
              <Ionicons name="moon-outline" size={16} color={Colors.violetLight} />
              <Text style={styles.sunText}>Set: {PANCHANG_DATA.sunset}</Text>
            </View>
            <View style={styles.sunItem}>
              <Ionicons name="warning-outline" size={16} color={Colors.error} />
              <Text style={[styles.sunText, { color: Colors.error }]}>Rahu: {PANCHANG_DATA.rahukaal}</Text>
            </View>
          </View>
        </View>

        {/* Zodiac Wheel */}
        <Text style={styles.sectionTitle}>Explore Zodiac Signs</Text>
        <ScrollView horizontal showsHorizontalScrollIndicator={false} style={styles.zodiacScroll}>
          {ZODIAC_SIGNS.map(sign => (
            <TouchableOpacity
              key={sign.sign}
              style={[styles.zodiacChip, { borderColor: sign.color + '55' }]}
              onPress={() => router.push({ pathname: '/horoscope/[sign]' as any, params: { sign: sign.sign } })}
              activeOpacity={0.75}
            >
              <Text style={[styles.zodiacSymbol, { color: sign.color }]}>{sign.symbol}</Text>
              <Text style={styles.zodiacName}>{sign.name}</Text>
              <Text style={styles.zodiacDates}>{sign.dates.split(' - ')[0]}</Text>
            </TouchableOpacity>
          ))}
        </ScrollView>

        {/* Daily Wisdom */}
        <View style={styles.wisdomCard}>
          <View style={styles.wisdomHeader}>
            <MaterialCommunityIcons name="lightbulb-on" size={22} color={Colors.accentLight} />
            <Text style={styles.wisdomTitle}>Daily Wisdom</Text>
          </View>
          <Text style={styles.wisdomText}>
            "The soul always knows what to do to heal itself. The challenge is to silence the mind."
          </Text>
          <Text style={styles.wisdomAuthor}>— Caroline Myss</Text>
        </View>
      </ScrollView>
    </GradientBackground>
  );
}

const styles = StyleSheet.create({
  scroll: { flex: 1 },
  content: { paddingHorizontal: 16 },
  header: { flexDirection: 'row', justifyContent: 'space-between', alignItems: 'flex-start', marginBottom: 24 },
  greeting: { fontFamily: 'Inter_400Regular', fontSize: 13, color: Colors.textSecondary, marginBottom: 2 },
  appName: { fontFamily: 'Inter_700Bold', fontSize: 18, color: Colors.text, lineHeight: 24 },
  userName: { fontFamily: 'Inter_500Medium', fontSize: 13, color: Colors.accentLight, marginTop: 2 },
  avatarBtn: { padding: 4 },
  heroBanner: {
    borderRadius: 20,
    backgroundColor: 'rgba(123,47,190,0.22)',
    borderWidth: 1,
    borderColor: 'rgba(201,168,76,0.3)',
    padding: 24,
    marginBottom: 28,
    alignItems: 'center',
    overflow: 'hidden',
  },
  heroOrbs: { flexDirection: 'row', gap: 20, marginBottom: 16 },
  heroSymbol: {
    width: 44,
    height: 44,
    borderRadius: 22,
    backgroundColor: 'rgba(201,168,76,0.18)',
    alignItems: 'center',
    justifyContent: 'center',
  },
  heroSymbolText: { fontSize: 22, color: Colors.accentLight },
  heroBannerTitle: { fontFamily: 'Inter_700Bold', fontSize: 26, color: Colors.text, textAlign: 'center', marginBottom: 6 },
  heroBannerSub: { fontFamily: 'Inter_400Regular', fontSize: 14, color: Colors.textSecondary, textAlign: 'center', marginBottom: 20 },
  heroBtn: {
    flexDirection: 'row',
    alignItems: 'center',
    backgroundColor: Colors.accentLight,
    paddingHorizontal: 24,
    paddingVertical: 12,
    borderRadius: 50,
    gap: 8,
  },
  heroBtnText: { fontFamily: 'Inter_600SemiBold', fontSize: 14, color: Colors.primaryDark },
  sectionTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 17, color: Colors.text, marginBottom: 14, marginTop: 4 },
  quickGrid: { flexDirection: 'row', flexWrap: 'wrap', gap: 12, marginBottom: 28 },
  quickCard: {
    width: (width - 56) / 3,
    alignItems: 'center',
    backgroundColor: Colors.card,
    borderRadius: 16,
    borderWidth: 1,
    borderColor: Colors.cardBorder,
    paddingVertical: 18,
    paddingHorizontal: 8,
    gap: 10,
  },
  quickIconCircle: { width: 52, height: 52, borderRadius: 26, alignItems: 'center', justifyContent: 'center' },
  quickLabel: { fontFamily: 'Inter_500Medium', fontSize: 12, color: Colors.text, textAlign: 'center' },
  panchangCard: {
    backgroundColor: Colors.card,
    borderRadius: 16,
    borderWidth: 1,
    borderColor: Colors.cardBorder,
    padding: 16,
    marginBottom: 28,
  },
  panchangRow: { flexDirection: 'row', alignItems: 'center', marginBottom: 14 },
  panchangItem: { flex: 1, alignItems: 'center', gap: 6 },
  panchangDivider: { width: 1, height: 50, backgroundColor: Colors.cardBorder },
  panchangLabel: { fontFamily: 'Inter_400Regular', fontSize: 11, color: Colors.textMuted },
  panchangValue: { fontFamily: 'Inter_600SemiBold', fontSize: 13, color: Colors.text, textAlign: 'center' },
  panchangSunRow: { flexDirection: 'row', justifyContent: 'space-between', borderTopWidth: 1, borderTopColor: Colors.cardBorder, paddingTop: 12 },
  sunItem: { flexDirection: 'row', alignItems: 'center', gap: 5 },
  sunText: { fontFamily: 'Inter_400Regular', fontSize: 11, color: Colors.textSecondary },
  zodiacScroll: { marginBottom: 28 },
  zodiacChip: {
    alignItems: 'center',
    backgroundColor: Colors.card,
    borderRadius: 14,
    borderWidth: 1,
    paddingHorizontal: 16,
    paddingVertical: 14,
    marginRight: 10,
    minWidth: 90,
    gap: 4,
  },
  zodiacSymbol: { fontSize: 26 },
  zodiacName: { fontFamily: 'Inter_600SemiBold', fontSize: 13, color: Colors.text },
  zodiacDates: { fontFamily: 'Inter_400Regular', fontSize: 10, color: Colors.textMuted },
  wisdomCard: {
    backgroundColor: 'rgba(201,168,76,0.1)',
    borderRadius: 16,
    borderWidth: 1,
    borderColor: 'rgba(201,168,76,0.25)',
    padding: 20,
    marginBottom: 8,
  },
  wisdomHeader: { flexDirection: 'row', alignItems: 'center', gap: 10, marginBottom: 14 },
  wisdomTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 15, color: Colors.accentLight },
  wisdomText: { fontFamily: 'Inter_400Regular', fontSize: 15, color: Colors.text, lineHeight: 24, fontStyle: 'italic', marginBottom: 10 },
  wisdomAuthor: { fontFamily: 'Inter_500Medium', fontSize: 13, color: Colors.accentLight },
});

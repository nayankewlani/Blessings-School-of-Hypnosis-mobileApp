import React, { useState, useRef } from 'react';
import {
  View, Text, StyleSheet, ScrollView, TouchableOpacity,
  Animated, Platform, FlatList,
} from 'react-native';
import { Ionicons } from '@expo/vector-icons';
import { router } from 'expo-router';
import { useSafeAreaInsets } from 'react-native-safe-area-context';
import { GradientBackground } from '@/components/GradientBackground';
import { Colors } from '@/constants/colors';
import { ZODIAC_SIGNS } from '@/utils/astrology';
import { useUser } from '@/context/UserContext';

const WEB_TOP = Platform.OS === 'web' ? 67 : 0;
const WEB_BOTTOM = Platform.OS === 'web' ? 34 : 0;

const PERIODS = ['Today', 'Weekly', 'Monthly', 'Yearly'];

function StarRating({ rating }: { rating: number }) {
  return (
    <View style={{ flexDirection: 'row', gap: 3 }}>
      {[1, 2, 3, 4, 5].map(i => (
        <Ionicons key={i} name={i <= rating ? 'star' : 'star-outline'} size={13} color={Colors.accentLight} />
      ))}
    </View>
  );
}

function ZodiacCard({ sign, isSelected, onPress }: {
  sign: typeof ZODIAC_SIGNS[0]; isSelected: boolean; onPress: () => void;
}) {
  const scale = useRef(new Animated.Value(1)).current;
  const handlePress = () => {
    Animated.sequence([
      Animated.timing(scale, { toValue: 0.93, duration: 80, useNativeDriver: true }),
      Animated.timing(scale, { toValue: 1, duration: 80, useNativeDriver: true }),
    ]).start(onPress);
  };
  return (
    <Animated.View style={{ transform: [{ scale }] }}>
      <TouchableOpacity
        style={[
          styles.zodiacCard,
          isSelected && { borderColor: sign.color, backgroundColor: sign.color + '22' },
        ]}
        onPress={handlePress}
        activeOpacity={0.8}
      >
        <Text style={[styles.zodiacSymbol, { color: isSelected ? sign.color : Colors.textSecondary }]}>
          {sign.symbol}
        </Text>
        <Text style={[styles.zodiacName, { color: isSelected ? Colors.text : Colors.textSecondary }]}>
          {sign.name}
        </Text>
      </TouchableOpacity>
    </Animated.View>
  );
}

export default function HoroscopeScreen() {
  const insets = useSafeAreaInsets();
  const { profile } = useUser();
  const [selectedSign, setSelectedSign] = useState<string>(profile.zodiacSign || 'aries');
  const [selectedPeriod, setSelectedPeriod] = useState(0);

  const sign = ZODIAC_SIGNS.find(z => z.sign === selectedSign) || ZODIAC_SIGNS[0];

  const WEEKLY_TEXT = `This week, ${sign.name} enters a powerful phase of transformation. Your ruling planet ${sign.planet} aligns favorably, bringing opportunities for growth across all life areas. The first half of the week is ideal for initiating projects, while the latter half favors deepening relationships. Remain open to unexpected insights that arrive in quiet moments.`;
  const MONTHLY_TEXT = `${sign.name}'s month ahead overflows with cosmic blessings and meaningful progress. Major planetary alignments support your ambitions while simultaneously urging inner reflection. A significant turning point arrives mid-month that redirects your path toward greater fulfillment. Trust the universal intelligence that guides your journey.`;
  const YEARLY_TEXT = `The year ahead promises transformation at every level for ${sign.name}. Jupiter's expansive influence opens doors that have long been closed, while Saturn ensures you build wisely upon new foundations. Relationships undergo beautiful evolution as you grow into your most authentic self. Financial improvements and creative breakthroughs mark this as a landmark year.`;

  const getPeriodText = () => {
    if (selectedPeriod === 0) return null;
    if (selectedPeriod === 1) return WEEKLY_TEXT;
    if (selectedPeriod === 2) return MONTHLY_TEXT;
    return YEARLY_TEXT;
  };

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
        <Text style={styles.pageTitle}>Horoscope</Text>
        <Text style={styles.pageSubtitle}>Celestial guidance for your journey</Text>

        {/* Period Tabs */}
        <View style={styles.periodTabs}>
          {PERIODS.map((p, i) => (
            <TouchableOpacity
              key={p}
              style={[styles.periodTab, i === selectedPeriod && styles.periodTabActive]}
              onPress={() => setSelectedPeriod(i)}
            >
              <Text style={[styles.periodTabText, i === selectedPeriod && styles.periodTabTextActive]}>
                {p}
              </Text>
            </TouchableOpacity>
          ))}
        </View>

        {/* Zodiac Horizontal Scroll */}
        <FlatList
          data={ZODIAC_SIGNS}
          horizontal
          showsHorizontalScrollIndicator={false}
          keyExtractor={(item) => item.sign}
          contentContainerStyle={styles.zodiacList}
          renderItem={({ item }) => (
            <ZodiacCard
              sign={item}
              isSelected={selectedSign === item.sign}
              onPress={() => setSelectedSign(item.sign)}
            />
          )}
        />

        {/* Selected Sign Hero */}
        <TouchableOpacity
          style={[styles.signHero, { borderColor: sign.color + '60' }]}
          onPress={() => router.push({ pathname: '/horoscope/[sign]' as any, params: { sign: sign.sign } })}
          activeOpacity={0.88}
        >
          <View style={[styles.signIconBg, { backgroundColor: sign.color + '22' }]}>
            <Text style={[styles.signSymbolLg, { color: sign.color }]}>{sign.symbol}</Text>
          </View>
          <View style={styles.signInfo}>
            <Text style={styles.signNameLg}>{sign.name}</Text>
            <Text style={styles.signDates}>{sign.dates}</Text>
            <Text style={styles.signMeta}>{sign.element} · {sign.planet}</Text>
          </View>
          <Ionicons name="chevron-forward" size={22} color={Colors.textMuted} />
        </TouchableOpacity>

        {/* Today's Reading */}
        {selectedPeriod === 0 ? (
          <>
            <View style={styles.readingCard}>
              <View style={styles.readingHeader}>
                <Text style={styles.readingTitle}>Today's Reading</Text>
                <StarRating rating={4} />
              </View>
              <Text style={styles.readingText}>
                {`Today, ${sign.name} channels the powerful energy of ${sign.planet} in remarkable ways. Your ${sign.element} nature reaches a peak of expression, granting you unusual clarity and insight. Pay attention to synchronicities that appear throughout your day — the universe speaks in symbols and signs that your receptive heart will recognize.`}
              </Text>
            </View>

            {[
              { icon: 'heart', label: 'Love & Relationships', color: '#FF6B6B', text: `Romantic energy flows beautifully for ${sign.name} today. Your capacity for deep connection opens hearts and creates meaningful bonds. Whether single or committed, love expresses itself in unexpected, touching ways.` },
              { icon: 'briefcase', label: 'Career & Finance', color: Colors.accentLight, text: 'Professional opportunities align with your highest values today. Financial decisions made with careful thought and intuitive guidance prove especially rewarding. Trust your expertise.' },
              { icon: 'fitness', label: 'Health & Wellness', color: Colors.teal, text: 'Your physical vitality responds beautifully to mindful attention today. Listen to what your body is communicating and honor those signals. Both rest and movement have their perfect timing.' },
            ].map(item => (
              <View key={item.label} style={styles.aspectCard}>
                <View style={[styles.aspectIcon, { backgroundColor: item.color + '22' }]}>
                  <Ionicons name={item.icon as any} size={20} color={item.color} />
                </View>
                <View style={styles.aspectContent}>
                  <Text style={styles.aspectLabel}>{item.label}</Text>
                  <Text style={styles.aspectText}>{item.text}</Text>
                </View>
              </View>
            ))}

            <View style={styles.luckyCard}>
              <Text style={styles.luckyTitle}>Lucky Elements</Text>
              <View style={styles.luckyRow}>
                {[
                  { icon: 'dice', label: 'Number', value: '7' },
                  { icon: 'color-palette', label: 'Color', value: 'Violet' },
                  { icon: 'compass', label: 'Direction', value: 'East' },
                ].map(l => (
                  <View key={l.label} style={styles.luckyItem}>
                    <Ionicons name={l.icon as any} size={20} color={Colors.accentLight} />
                    <Text style={styles.luckyLabel}>{l.label}</Text>
                    <Text style={styles.luckyValue}>{l.value}</Text>
                  </View>
                ))}
              </View>
            </View>
          </>
        ) : (
          <View style={styles.readingCard}>
            <Text style={styles.readingTitle}>{PERIODS[selectedPeriod]} Forecast</Text>
            <Text style={styles.readingText}>{getPeriodText()}</Text>
          </View>
        )}
      </ScrollView>
    </GradientBackground>
  );
}

const styles = StyleSheet.create({
  scroll: { flex: 1 },
  content: { paddingHorizontal: 16 },
  pageTitle: { fontFamily: 'Inter_700Bold', fontSize: 28, color: Colors.text, marginBottom: 4 },
  pageSubtitle: { fontFamily: 'Inter_400Regular', fontSize: 14, color: Colors.textSecondary, marginBottom: 20 },
  periodTabs: { flexDirection: 'row', backgroundColor: Colors.card, borderRadius: 12, padding: 4, marginBottom: 20, borderWidth: 1, borderColor: Colors.cardBorder },
  periodTab: { flex: 1, paddingVertical: 10, alignItems: 'center', borderRadius: 9 },
  periodTabActive: { backgroundColor: Colors.violetLight },
  periodTabText: { fontFamily: 'Inter_500Medium', fontSize: 13, color: Colors.textSecondary },
  periodTabTextActive: { color: Colors.text },
  zodiacList: { paddingBottom: 16 },
  zodiacCard: {
    alignItems: 'center',
    borderRadius: 14,
    borderWidth: 1,
    borderColor: Colors.cardBorder,
    backgroundColor: Colors.card,
    paddingHorizontal: 14,
    paddingVertical: 12,
    marginRight: 10,
    minWidth: 74,
    gap: 4,
  },
  zodiacSymbol: { fontSize: 24 },
  zodiacName: { fontFamily: 'Inter_500Medium', fontSize: 11 },
  signHero: {
    flexDirection: 'row',
    alignItems: 'center',
    backgroundColor: Colors.card,
    borderRadius: 18,
    borderWidth: 1,
    padding: 18,
    marginBottom: 20,
    gap: 16,
  },
  signIconBg: { width: 64, height: 64, borderRadius: 32, alignItems: 'center', justifyContent: 'center' },
  signSymbolLg: { fontSize: 36 },
  signInfo: { flex: 1 },
  signNameLg: { fontFamily: 'Inter_700Bold', fontSize: 22, color: Colors.text },
  signDates: { fontFamily: 'Inter_400Regular', fontSize: 13, color: Colors.textSecondary, marginTop: 2 },
  signMeta: { fontFamily: 'Inter_500Medium', fontSize: 12, color: Colors.accentLight, marginTop: 4 },
  readingCard: { backgroundColor: Colors.card, borderRadius: 16, borderWidth: 1, borderColor: Colors.cardBorder, padding: 18, marginBottom: 14 },
  readingHeader: { flexDirection: 'row', justifyContent: 'space-between', alignItems: 'center', marginBottom: 12 },
  readingTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 16, color: Colors.text },
  readingText: { fontFamily: 'Inter_400Regular', fontSize: 14, color: Colors.textSecondary, lineHeight: 22 },
  aspectCard: { flexDirection: 'row', backgroundColor: Colors.card, borderRadius: 14, borderWidth: 1, borderColor: Colors.cardBorder, padding: 14, marginBottom: 10, gap: 14, alignItems: 'flex-start' },
  aspectIcon: { width: 42, height: 42, borderRadius: 21, alignItems: 'center', justifyContent: 'center' },
  aspectContent: { flex: 1 },
  aspectLabel: { fontFamily: 'Inter_600SemiBold', fontSize: 14, color: Colors.text, marginBottom: 4 },
  aspectText: { fontFamily: 'Inter_400Regular', fontSize: 13, color: Colors.textSecondary, lineHeight: 20 },
  luckyCard: { backgroundColor: 'rgba(201,168,76,0.1)', borderRadius: 16, borderWidth: 1, borderColor: 'rgba(201,168,76,0.25)', padding: 18 },
  luckyTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 15, color: Colors.accentLight, marginBottom: 14 },
  luckyRow: { flexDirection: 'row', justifyContent: 'space-around' },
  luckyItem: { alignItems: 'center', gap: 6 },
  luckyLabel: { fontFamily: 'Inter_400Regular', fontSize: 11, color: Colors.textMuted },
  luckyValue: { fontFamily: 'Inter_600SemiBold', fontSize: 15, color: Colors.text },
});

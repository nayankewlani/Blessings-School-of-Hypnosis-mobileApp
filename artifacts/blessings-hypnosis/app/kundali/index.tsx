import React, { useState } from 'react';
import {
  View, Text, StyleSheet, ScrollView, TouchableOpacity,
  Platform, Dimensions,
} from 'react-native';
import { Ionicons } from '@expo/vector-icons';
import { router } from 'expo-router';
import { useSafeAreaInsets } from 'react-native-safe-area-context';
import { GradientBackground } from '@/components/GradientBackground';
import { Colors } from '@/constants/colors';
import { useUser } from '@/context/UserContext';
import { ZODIAC_SIGNS } from '@/utils/astrology';

const WEB_TOP = Platform.OS === 'web' ? 67 : 0;
const WEB_BOTTOM = Platform.OS === 'web' ? 34 : 0;
const { width } = Dimensions.get('window');

const HOUSES = [
  { num: 1, name: 'Ascendant', sign: 'Aries', planet: 'Mars', meaning: 'Self & Personality' },
  { num: 2, name: 'Second House', sign: 'Taurus', planet: 'Venus', meaning: 'Wealth & Values' },
  { num: 3, name: 'Third House', sign: 'Gemini', planet: 'Mercury', meaning: 'Communication' },
  { num: 4, name: 'Fourth House', sign: 'Cancer', planet: 'Moon', meaning: 'Home & Mother' },
  { num: 5, name: 'Fifth House', sign: 'Leo', planet: 'Sun', meaning: 'Creativity & Love' },
  { num: 6, name: 'Sixth House', sign: 'Virgo', planet: 'Mercury', meaning: 'Health & Service' },
  { num: 7, name: 'Seventh House', sign: 'Libra', planet: 'Venus', meaning: 'Marriage & Partner' },
  { num: 8, name: 'Eighth House', sign: 'Scorpio', planet: 'Mars', meaning: 'Transformation' },
  { num: 9, name: 'Ninth House', sign: 'Sagittarius', planet: 'Jupiter', meaning: 'Dharma & Fortune' },
  { num: 10, name: 'Tenth House', sign: 'Capricorn', planet: 'Saturn', meaning: 'Career & Status' },
  { num: 11, name: 'Eleventh House', sign: 'Aquarius', planet: 'Saturn', meaning: 'Gains & Friends' },
  { num: 12, name: 'Twelfth House', sign: 'Pisces', planet: 'Jupiter', meaning: 'Liberation & Loss' },
];

const PLANETS_DATA = [
  { planet: 'Sun', sign: 'Leo', house: '5th', degree: '14°32\'', status: 'Exalted' },
  { planet: 'Moon', sign: 'Taurus', house: '2nd', degree: '8°15\'', status: 'Exalted' },
  { planet: 'Mercury', sign: 'Virgo', house: '6th', degree: '22°40\'', status: 'Strong' },
  { planet: 'Venus', sign: 'Libra', house: '7th', degree: '5°18\'', status: 'Own Sign' },
  { planet: 'Mars', sign: 'Aries', house: '1st', degree: '19°55\'', status: 'Strong' },
  { planet: 'Jupiter', sign: 'Cancer', house: '4th', degree: '11°22\'', status: 'Exalted' },
  { planet: 'Saturn', sign: 'Capricorn', house: '10th', degree: '3°47\'', status: 'Own Sign' },
  { planet: 'Rahu', sign: 'Gemini', house: '3rd', degree: '17°8\'', status: 'Neutral' },
  { planet: 'Ketu', sign: 'Sagittarius', house: '9th', degree: '17°8\'', status: 'Neutral' },
];

// Simplified chart SVG-like view using pure React Native
function BirthChart() {
  const size = width - 40;
  const cell = size / 4;

  const houses = [
    [3, 4, 5, 6],
    [2, null, null, 7],
    [1, null, null, 8],
    [12, 11, 10, 9],
  ];

  return (
    <View style={[styles.chartContainer, { width: size, height: size }]}>
      {houses.map((row, ri) =>
        row.map((h, ci) => {
          if (h === null) {
            if (ri === 1 && ci === 1) return (
              <View key={`center-${ri}-${ci}`} style={[styles.chartCenter, { width: cell * 2, height: cell * 2, left: cell, top: cell }]}>
                <Text style={styles.chartCenterText}>Birth</Text>
                <Text style={styles.chartCenterText}>Chart</Text>
              </View>
            );
            return null;
          }
          const houseData = HOUSES[h - 1];
          const signData = ZODIAC_SIGNS.find(z => z.name === houseData.sign);
          return (
            <View
              key={h}
              style={[
                styles.chartCell,
                {
                  width: cell,
                  height: cell,
                  left: ci * cell,
                  top: ri * cell,
                  borderColor: 'rgba(201,168,76,0.3)',
                }
              ]}
            >
              <Text style={styles.chartHouseNum}>{h}</Text>
              {signData && <Text style={[styles.chartSign, { color: signData.color }]}>{signData.symbol}</Text>}
              <Text style={styles.chartSignName}>{houseData.sign.slice(0, 3)}</Text>
            </View>
          );
        })
      )}
    </View>
  );
}

export default function KundaliScreen() {
  const insets = useSafeAreaInsets();
  const { profile, isProfileComplete } = useUser();
  const [activeTab, setActiveTab] = useState<'chart' | 'planets' | 'houses'>('chart');

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
          <Text style={styles.backText}>Kundali / Birth Chart</Text>
        </TouchableOpacity>

        {!isProfileComplete && (
          <View style={styles.warnCard}>
            <Ionicons name="information-circle" size={22} color={Colors.accentLight} />
            <View style={{ flex: 1 }}>
              <Text style={styles.warnTitle}>Complete Your Profile</Text>
              <Text style={styles.warnText}>Add your birth details for a personalized Kundali reading.</Text>
            </View>
            <TouchableOpacity onPress={() => router.push('/profile')} style={styles.warnBtn}>
              <Text style={styles.warnBtnText}>Update</Text>
            </TouchableOpacity>
          </View>
        )}

        {isProfileComplete && (
          <View style={styles.userInfoCard}>
            <Text style={styles.userInfoName}>{profile.name}</Text>
            <Text style={styles.userInfoDetail}>{profile.birthDate} · {profile.birthTime || 'Time unknown'}</Text>
            <Text style={styles.userInfoDetail}>{profile.birthPlace || 'Place unknown'}</Text>
          </View>
        )}

        {/* Tabs */}
        <View style={styles.tabs}>
          {(['chart', 'planets', 'houses'] as const).map(t => (
            <TouchableOpacity
              key={t}
              style={[styles.tab, activeTab === t && styles.tabActive]}
              onPress={() => setActiveTab(t)}
            >
              <Text style={[styles.tabText, activeTab === t && styles.tabTextActive]}>
                {t.charAt(0).toUpperCase() + t.slice(1)}
              </Text>
            </TouchableOpacity>
          ))}
        </View>

        {activeTab === 'chart' && (
          <View style={styles.chartWrapper}>
            <BirthChart />
            <Text style={styles.chartNote}>
              North Indian Style Birth Chart · Lagna Kundali
            </Text>
          </View>
        )}

        {activeTab === 'planets' && (
          <View style={styles.tableCard}>
            <View style={styles.tableHeader}>
              <Text style={[styles.tableCell, styles.tableHead, { flex: 1.5 }]}>Planet</Text>
              <Text style={[styles.tableCell, styles.tableHead, { flex: 1.5 }]}>Sign</Text>
              <Text style={[styles.tableCell, styles.tableHead]}>House</Text>
              <Text style={[styles.tableCell, styles.tableHead, { flex: 2 }]}>Status</Text>
            </View>
            {PLANETS_DATA.map((p, i) => (
              <View key={p.planet} style={[styles.tableRow, i % 2 === 0 && styles.tableRowAlt]}>
                <Text style={[styles.tableCell, { flex: 1.5, color: Colors.accentLight, fontFamily: 'Inter_600SemiBold' }]}>{p.planet}</Text>
                <Text style={[styles.tableCell, { flex: 1.5 }]}>{p.sign}</Text>
                <Text style={styles.tableCell}>{p.house}</Text>
                <Text style={[styles.tableCell, { flex: 2, color: Colors.teal }]}>{p.status}</Text>
              </View>
            ))}
          </View>
        )}

        {activeTab === 'houses' && (
          <View>
            {HOUSES.map(house => (
              <View key={house.num} style={styles.houseCard}>
                <View style={styles.houseNum}>
                  <Text style={styles.houseNumText}>{house.num}</Text>
                </View>
                <View style={styles.houseInfo}>
                  <Text style={styles.houseName}>{house.name}</Text>
                  <Text style={styles.houseMeta}>{house.sign} · {house.planet}</Text>
                  <Text style={styles.houseMeaning}>{house.meaning}</Text>
                </View>
              </View>
            ))}
          </View>
        )}

        {/* Dasha Period */}
        <View style={styles.dashaCard}>
          <View style={styles.dashaHeader}>
            <Ionicons name="timer" size={20} color={Colors.violetLight} />
            <Text style={styles.dashaTitle}>Current Dasha Period</Text>
          </View>
          <Text style={styles.dashaCurrent}>Jupiter Mahadasha</Text>
          <Text style={styles.dashaDetail}>2019 - 2035 · 16 years</Text>
          <Text style={styles.dashaText}>
            Jupiter's Mahadasha brings expansion, wisdom, and spiritual growth. This is an auspicious period for education, travel, and accumulation of knowledge and wealth.
          </Text>
        </View>
      </ScrollView>
    </GradientBackground>
  );
}

const styles = StyleSheet.create({
  scroll: { flex: 1 },
  content: { paddingHorizontal: 16 },
  backBtn: { flexDirection: 'row', alignItems: 'center', gap: 8, marginBottom: 24 },
  backText: { fontFamily: 'Inter_700Bold', fontSize: 18, color: Colors.text },
  warnCard: { flexDirection: 'row', alignItems: 'center', gap: 12, backgroundColor: 'rgba(201,168,76,0.1)', borderRadius: 14, borderWidth: 1, borderColor: 'rgba(201,168,76,0.25)', padding: 14, marginBottom: 16 },
  warnTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 14, color: Colors.text, marginBottom: 2 },
  warnText: { fontFamily: 'Inter_400Regular', fontSize: 12, color: Colors.textSecondary },
  warnBtn: { backgroundColor: Colors.accentLight, borderRadius: 8, paddingHorizontal: 12, paddingVertical: 8 },
  warnBtnText: { fontFamily: 'Inter_600SemiBold', fontSize: 12, color: Colors.primaryDark },
  userInfoCard: { backgroundColor: Colors.card, borderRadius: 14, borderWidth: 1, borderColor: Colors.cardBorder, padding: 14, marginBottom: 16 },
  userInfoName: { fontFamily: 'Inter_700Bold', fontSize: 18, color: Colors.text, marginBottom: 4 },
  userInfoDetail: { fontFamily: 'Inter_400Regular', fontSize: 13, color: Colors.textSecondary, marginTop: 2 },
  tabs: { flexDirection: 'row', backgroundColor: Colors.card, borderRadius: 12, padding: 4, marginBottom: 20, borderWidth: 1, borderColor: Colors.cardBorder },
  tab: { flex: 1, paddingVertical: 10, alignItems: 'center', borderRadius: 9 },
  tabActive: { backgroundColor: Colors.violetLight },
  tabText: { fontFamily: 'Inter_500Medium', fontSize: 13, color: Colors.textSecondary },
  tabTextActive: { color: Colors.text },
  chartWrapper: { alignItems: 'center', marginBottom: 20 },
  chartContainer: { position: 'relative', backgroundColor: 'rgba(255,255,255,0.03)', borderWidth: 1, borderColor: 'rgba(201,168,76,0.3)', borderRadius: 4 },
  chartCell: { position: 'absolute', borderWidth: 0.5, alignItems: 'center', justifyContent: 'center', gap: 2 },
  chartHouseNum: { fontFamily: 'Inter_400Regular', fontSize: 10, color: Colors.textMuted, position: 'absolute', top: 4, left: 6 },
  chartSign: { fontSize: 18 },
  chartSignName: { fontFamily: 'Inter_500Medium', fontSize: 10, color: Colors.textSecondary },
  chartCenter: { position: 'absolute', alignItems: 'center', justifyContent: 'center' },
  chartCenterText: { fontFamily: 'Inter_600SemiBold', fontSize: 13, color: Colors.accentLight },
  chartNote: { fontFamily: 'Inter_400Regular', fontSize: 12, color: Colors.textMuted, marginTop: 10, textAlign: 'center' },
  tableCard: { backgroundColor: Colors.card, borderRadius: 16, borderWidth: 1, borderColor: Colors.cardBorder, overflow: 'hidden', marginBottom: 20 },
  tableHeader: { flexDirection: 'row', backgroundColor: 'rgba(201,168,76,0.15)', paddingVertical: 12, paddingHorizontal: 14 },
  tableHead: { fontFamily: 'Inter_600SemiBold', fontSize: 12, color: Colors.accentLight },
  tableRow: { flexDirection: 'row', paddingVertical: 12, paddingHorizontal: 14 },
  tableRowAlt: { backgroundColor: 'rgba(255,255,255,0.03)' },
  tableCell: { flex: 1, fontFamily: 'Inter_400Regular', fontSize: 13, color: Colors.textSecondary },
  houseCard: { flexDirection: 'row', alignItems: 'center', backgroundColor: Colors.card, borderRadius: 12, borderWidth: 1, borderColor: Colors.cardBorder, padding: 14, marginBottom: 8, gap: 14 },
  houseNum: { width: 36, height: 36, borderRadius: 18, backgroundColor: 'rgba(201,168,76,0.2)', alignItems: 'center', justifyContent: 'center' },
  houseNumText: { fontFamily: 'Inter_700Bold', fontSize: 15, color: Colors.accentLight },
  houseInfo: { flex: 1 },
  houseName: { fontFamily: 'Inter_600SemiBold', fontSize: 14, color: Colors.text, marginBottom: 2 },
  houseMeta: { fontFamily: 'Inter_500Medium', fontSize: 12, color: Colors.accentLight, marginBottom: 2 },
  houseMeaning: { fontFamily: 'Inter_400Regular', fontSize: 12, color: Colors.textSecondary },
  dashaCard: { backgroundColor: 'rgba(123,47,190,0.15)', borderRadius: 16, borderWidth: 1, borderColor: 'rgba(123,47,190,0.3)', padding: 18, marginBottom: 14, marginTop: 8 },
  dashaHeader: { flexDirection: 'row', alignItems: 'center', gap: 10, marginBottom: 12 },
  dashaTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 16, color: Colors.violetLight },
  dashaCurrent: { fontFamily: 'Inter_700Bold', fontSize: 22, color: Colors.text, marginBottom: 4 },
  dashaDetail: { fontFamily: 'Inter_500Medium', fontSize: 13, color: Colors.accentLight, marginBottom: 12 },
  dashaText: { fontFamily: 'Inter_400Regular', fontSize: 14, color: Colors.textSecondary, lineHeight: 22 },
});

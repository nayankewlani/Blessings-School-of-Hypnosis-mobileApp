import React, { useState } from 'react';
import {
  View, Text, StyleSheet, ScrollView, TouchableOpacity, Platform,
} from 'react-native';
import { Ionicons } from '@expo/vector-icons';
import { router } from 'expo-router';
import { useSafeAreaInsets } from 'react-native-safe-area-context';
import { GradientBackground } from '@/components/GradientBackground';
import { Colors } from '@/constants/colors';
import { PANCHANG_DATA } from '@/utils/astrology';

const WEB_TOP = Platform.OS === 'web' ? 67 : 0;
const WEB_BOTTOM = Platform.OS === 'web' ? 34 : 0;

const WEEKDAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
const MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

function MiniCalendar() {
  const today = new Date();
  const [month, setMonth] = useState(today.getMonth());
  const [year, setYear] = useState(today.getFullYear());
  const [selected, setSelected] = useState(today.getDate());

  const firstDay = new Date(year, month, 1).getDay();
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const cells: (number | null)[] = [...Array(firstDay).fill(null), ...Array.from({ length: daysInMonth }, (_, i) => i + 1)];

  const prevMonth = () => {
    if (month === 0) { setMonth(11); setYear(y => y - 1); }
    else setMonth(m => m - 1);
  };
  const nextMonth = () => {
    if (month === 11) { setMonth(0); setYear(y => y + 1); }
    else setMonth(m => m + 1);
  };

  // Mark some auspicious days
  const auspiciousDays = [3, 8, 11, 15, 20, 26, 30];
  const inauspiciousDays = [5, 14, 22, 29];

  return (
    <View style={styles.calendarCard}>
      <View style={styles.calHeader}>
        <TouchableOpacity onPress={prevMonth} style={styles.calNavBtn}>
          <Ionicons name="chevron-back" size={20} color={Colors.text} />
        </TouchableOpacity>
        <Text style={styles.calTitle}>{MONTHS[month]} {year}</Text>
        <TouchableOpacity onPress={nextMonth} style={styles.calNavBtn}>
          <Ionicons name="chevron-forward" size={20} color={Colors.text} />
        </TouchableOpacity>
      </View>
      <View style={styles.calWeekRow}>
        {WEEKDAYS.map(d => (
          <Text key={d} style={styles.calWeekDay}>{d}</Text>
        ))}
      </View>
      <View style={styles.calGrid}>
        {cells.map((day, i) => {
          if (!day) return <View key={`empty-${i}`} style={styles.calCell} />;
          const isToday = day === today.getDate() && month === today.getMonth() && year === today.getFullYear();
          const isSelected = day === selected;
          const isAuspicious = auspiciousDays.includes(day);
          const isInauspicious = inauspiciousDays.includes(day);
          return (
            <TouchableOpacity
              key={day}
              style={[
                styles.calCell,
                isSelected && styles.calCellSelected,
                isToday && !isSelected && styles.calCellToday,
              ]}
              onPress={() => setSelected(day)}
            >
              <Text style={[
                styles.calDayText,
                isSelected && { color: Colors.primaryDark, fontFamily: 'Inter_700Bold' },
                isToday && !isSelected && { color: Colors.accentLight },
              ]}>
                {day}
              </Text>
              {isAuspicious && <View style={styles.auspiciousDot} />}
              {isInauspicious && <View style={styles.inauspiciousDot} />}
            </TouchableOpacity>
          );
        })}
      </View>
      <View style={styles.calLegend}>
        <View style={styles.legendItem}>
          <View style={[styles.legendDot, { backgroundColor: Colors.success }]} />
          <Text style={styles.legendText}>Auspicious</Text>
        </View>
        <View style={styles.legendItem}>
          <View style={[styles.legendDot, { backgroundColor: Colors.error }]} />
          <Text style={styles.legendText}>Inauspicious</Text>
        </View>
      </View>
    </View>
  );
}

export default function PanchangScreen() {
  const insets = useSafeAreaInsets();
  const today = new Date();

  const PANCHANG_ITEMS = [
    { icon: 'moon', label: 'Tithi', value: PANCHANG_DATA.tithi, color: Colors.violetLight },
    { icon: 'star', label: 'Nakshatra', value: PANCHANG_DATA.nakshatra, color: Colors.accentLight },
    { icon: 'fitness', label: 'Yoga', value: PANCHANG_DATA.yoga, color: Colors.teal },
    { icon: 'ellipse', label: 'Karana', value: PANCHANG_DATA.karana, color: '#FF9800' },
    { icon: 'calendar', label: 'Var (Day)', value: PANCHANG_DATA.var, color: '#4CAF50' },
  ];

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
          <Text style={styles.backText}>Panchang</Text>
        </TouchableOpacity>

        <Text style={styles.todayDate}>
          {today.toLocaleDateString('en-IN', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}
        </Text>

        {/* Calendar */}
        <MiniCalendar />

        {/* Sun/Moon Times */}
        <View style={styles.timesCard}>
          {[
            { icon: 'sunny', label: 'Sunrise', value: PANCHANG_DATA.sunrise, color: Colors.gold },
            { icon: 'partly-sunny', label: 'Sunset', value: PANCHANG_DATA.sunset, color: '#FF9800' },
            { icon: 'moon', label: 'Moonrise', value: PANCHANG_DATA.moonrise, color: Colors.violetLight },
            { icon: 'moon-outline', label: 'Moonset', value: PANCHANG_DATA.moonset, color: '#607D8B' },
          ].map(item => (
            <View key={item.label} style={styles.timeItem}>
              <Ionicons name={item.icon as any} size={22} color={item.color} />
              <Text style={styles.timeLabel}>{item.label}</Text>
              <Text style={styles.timeValue}>{item.value}</Text>
            </View>
          ))}
        </View>

        {/* Panchang Elements */}
        <Text style={styles.sectionTitle}>Today's Panchang</Text>
        {PANCHANG_ITEMS.map(item => (
          <View key={item.label} style={[styles.panchangRow, { borderLeftColor: item.color, borderLeftWidth: 3 }]}>
            <View style={[styles.panchangIcon, { backgroundColor: item.color + '22' }]}>
              <Ionicons name={item.icon as any} size={20} color={item.color} />
            </View>
            <View style={styles.panchangInfo}>
              <Text style={styles.panchangLabel}>{item.label}</Text>
              <Text style={styles.panchangValue}>{item.value}</Text>
            </View>
          </View>
        ))}

        {/* Rahu Kaal */}
        <View style={styles.rahuCard}>
          <View style={styles.rahuHeader}>
            <Ionicons name="warning" size={20} color={Colors.error} />
            <Text style={styles.rahuTitle}>Rahu Kaal</Text>
            <View style={styles.rahuBadge}>
              <Text style={styles.rahuBadgeText}>Avoid Important Work</Text>
            </View>
          </View>
          <Text style={styles.rahuTime}>{PANCHANG_DATA.rahukaal}</Text>
          <Text style={styles.rahuDesc}>
            Rahu Kaal is an inauspicious time period each day ruled by the shadow planet Rahu. Avoid beginning new ventures, important journeys, or significant decisions during this time.
          </Text>
        </View>

        {/* Auspicious Times */}
        <Text style={styles.sectionTitle}>Auspicious Muhurtas</Text>
        {PANCHANG_DATA.auspicious.map(time => (
          <View key={time} style={styles.auspiciousCard}>
            <Ionicons name="checkmark-circle" size={20} color={Colors.success} />
            <Text style={styles.auspiciousText}>{time}</Text>
          </View>
        ))}

        {/* Inauspicious Times */}
        <Text style={[styles.sectionTitle, { marginTop: 12 }]}>Inauspicious Times</Text>
        {PANCHANG_DATA.inauspicious.map(time => (
          <View key={time} style={styles.inauspiciousCard}>
            <Ionicons name="close-circle" size={20} color={Colors.error} />
            <Text style={styles.inauspiciousText}>{time}</Text>
          </View>
        ))}

        {/* Festivals Placeholder */}
        <Text style={[styles.sectionTitle, { marginTop: 12 }]}>Upcoming Festivals</Text>
        {[
          { name: 'Ekadashi', date: 'In 2 days', color: Colors.violetLight },
          { name: 'Purnima (Full Moon)', date: 'In 5 days', color: Colors.gold },
          { name: 'Amavasya (New Moon)', date: 'In 20 days', color: Colors.textSecondary },
        ].map(f => (
          <View key={f.name} style={styles.festivalCard}>
            <View style={[styles.festivalDot, { backgroundColor: f.color }]} />
            <View>
              <Text style={styles.festivalName}>{f.name}</Text>
              <Text style={[styles.festivalDate, { color: f.color }]}>{f.date}</Text>
            </View>
          </View>
        ))}
      </ScrollView>
    </GradientBackground>
  );
}

const styles = StyleSheet.create({
  scroll: { flex: 1 },
  content: { paddingHorizontal: 16 },
  backBtn: { flexDirection: 'row', alignItems: 'center', gap: 8, marginBottom: 8 },
  backText: { fontFamily: 'Inter_700Bold', fontSize: 20, color: Colors.text },
  todayDate: { fontFamily: 'Inter_400Regular', fontSize: 13, color: Colors.textSecondary, marginBottom: 20 },
  calendarCard: { backgroundColor: Colors.card, borderRadius: 18, borderWidth: 1, borderColor: Colors.cardBorder, padding: 16, marginBottom: 20 },
  calHeader: { flexDirection: 'row', alignItems: 'center', justifyContent: 'space-between', marginBottom: 16 },
  calNavBtn: { padding: 8 },
  calTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 16, color: Colors.text },
  calWeekRow: { flexDirection: 'row', marginBottom: 8 },
  calWeekDay: { flex: 1, fontFamily: 'Inter_500Medium', fontSize: 11, color: Colors.textMuted, textAlign: 'center' },
  calGrid: { flexDirection: 'row', flexWrap: 'wrap' },
  calCell: { width: '14.28%', aspectRatio: 1, alignItems: 'center', justifyContent: 'center', borderRadius: 8 },
  calCellSelected: { backgroundColor: Colors.accentLight, borderRadius: 8 },
  calCellToday: { borderWidth: 1, borderColor: Colors.accentLight, borderRadius: 8 },
  calDayText: { fontFamily: 'Inter_400Regular', fontSize: 13, color: Colors.text },
  auspiciousDot: { width: 4, height: 4, borderRadius: 2, backgroundColor: Colors.success, position: 'absolute', bottom: 4 },
  inauspiciousDot: { width: 4, height: 4, borderRadius: 2, backgroundColor: Colors.error, position: 'absolute', bottom: 4 },
  calLegend: { flexDirection: 'row', gap: 20, marginTop: 12, justifyContent: 'center' },
  legendItem: { flexDirection: 'row', alignItems: 'center', gap: 6 },
  legendDot: { width: 8, height: 8, borderRadius: 4 },
  legendText: { fontFamily: 'Inter_400Regular', fontSize: 12, color: Colors.textSecondary },
  timesCard: { flexDirection: 'row', backgroundColor: Colors.card, borderRadius: 16, borderWidth: 1, borderColor: Colors.cardBorder, padding: 16, marginBottom: 20, justifyContent: 'space-around' },
  timeItem: { alignItems: 'center', gap: 6 },
  timeLabel: { fontFamily: 'Inter_400Regular', fontSize: 11, color: Colors.textMuted },
  timeValue: { fontFamily: 'Inter_600SemiBold', fontSize: 13, color: Colors.text },
  sectionTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 17, color: Colors.text, marginBottom: 12 },
  panchangRow: { flexDirection: 'row', alignItems: 'center', backgroundColor: Colors.card, borderRadius: 12, borderWidth: 1, borderColor: Colors.cardBorder, padding: 14, marginBottom: 8, gap: 14 },
  panchangIcon: { width: 40, height: 40, borderRadius: 20, alignItems: 'center', justifyContent: 'center' },
  panchangInfo: { flex: 1 },
  panchangLabel: { fontFamily: 'Inter_500Medium', fontSize: 11, color: Colors.textMuted, textTransform: 'uppercase', letterSpacing: 0.5, marginBottom: 3 },
  panchangValue: { fontFamily: 'Inter_600SemiBold', fontSize: 14, color: Colors.text },
  rahuCard: { backgroundColor: 'rgba(255,107,107,0.08)', borderRadius: 16, borderWidth: 1, borderColor: 'rgba(255,107,107,0.3)', padding: 16, marginBottom: 20, marginTop: 8 },
  rahuHeader: { flexDirection: 'row', alignItems: 'center', gap: 10, marginBottom: 8 },
  rahuTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 16, color: Colors.error, flex: 1 },
  rahuBadge: { backgroundColor: 'rgba(255,107,107,0.2)', borderRadius: 8, paddingHorizontal: 8, paddingVertical: 4 },
  rahuBadgeText: { fontFamily: 'Inter_500Medium', fontSize: 11, color: Colors.error },
  rahuTime: { fontFamily: 'Inter_700Bold', fontSize: 22, color: Colors.text, marginBottom: 8 },
  rahuDesc: { fontFamily: 'Inter_400Regular', fontSize: 13, color: Colors.textSecondary, lineHeight: 20 },
  auspiciousCard: { flexDirection: 'row', alignItems: 'center', gap: 10, backgroundColor: 'rgba(0,201,177,0.08)', borderRadius: 12, padding: 14, marginBottom: 8, borderWidth: 1, borderColor: 'rgba(0,201,177,0.2)' },
  auspiciousText: { fontFamily: 'Inter_400Regular', fontSize: 14, color: Colors.text },
  inauspiciousCard: { flexDirection: 'row', alignItems: 'center', gap: 10, backgroundColor: 'rgba(255,107,107,0.06)', borderRadius: 12, padding: 14, marginBottom: 8, borderWidth: 1, borderColor: 'rgba(255,107,107,0.2)' },
  inauspiciousText: { fontFamily: 'Inter_400Regular', fontSize: 14, color: Colors.text },
  festivalCard: { flexDirection: 'row', alignItems: 'center', gap: 14, backgroundColor: Colors.card, borderRadius: 12, borderWidth: 1, borderColor: Colors.cardBorder, padding: 14, marginBottom: 8 },
  festivalDot: { width: 10, height: 10, borderRadius: 5 },
  festivalName: { fontFamily: 'Inter_600SemiBold', fontSize: 14, color: Colors.text, marginBottom: 2 },
  festivalDate: { fontFamily: 'Inter_400Regular', fontSize: 12 },
});

import React from 'react';
import {
  View, Text, StyleSheet, ScrollView, TouchableOpacity, Platform,
} from 'react-native';
import { Ionicons, MaterialCommunityIcons } from '@expo/vector-icons';
import { router } from 'expo-router';
import { useSafeAreaInsets } from 'react-native-safe-area-context';
import { GradientBackground } from '@/components/GradientBackground';
import { Colors } from '@/constants/colors';

const WEB_TOP = Platform.OS === 'web' ? 67 : 0;
const WEB_BOTTOM = Platform.OS === 'web' ? 34 : 0;

const SERVICES = [
  {
    id: 'kundali',
    title: 'Kundali / Birth Chart',
    subtitle: 'Vedic Astrology',
    description: 'Discover your cosmic blueprint through the ancient science of Vedic astrology.',
    icon: 'compass',
    color: '#7B2FBE',
    route: '/kundali/',
  },
  {
    id: 'numerology',
    title: 'Numerology',
    subtitle: 'Sacred Number Wisdom',
    description: 'Unlock the mathematical mysteries woven into your birth date and name.',
    icon: 'calculator',
    color: '#FF6B6B',
    route: '/numerology/',
  },
  {
    id: 'tarot',
    title: 'Tarot Reading',
    subtitle: 'Divine Guidance Cards',
    description: 'Draw from the ancient wisdom of tarot to illuminate your path forward.',
    icon: 'diamond',
    color: '#00C9B1',
    route: '/tarot/',
  },
  {
    id: 'panchang',
    title: 'Panchang',
    subtitle: 'Hindu Calendar',
    description: 'Navigate auspicious timings and cosmic cycles for important life events.',
    icon: 'calendar',
    color: '#4CAF50',
    route: '/panchang/',
  },
  {
    id: 'meditation',
    title: 'Guided Meditation',
    subtitle: 'Inner Peace Practice',
    description: 'Journey inward with powerful meditation techniques for transformation.',
    icon: 'leaf',
    color: '#2196F3',
    route: '/meditation/',
  },
];

const ASTRO_TOOLS = [
  { id: 'compatibility', title: 'Love Compatibility', icon: 'heart', color: '#FF6B6B' },
  { id: 'muhurta', title: 'Muhurta', icon: 'time', color: '#C9A84C' },
  { id: 'vastu', title: 'Vastu Shastra', icon: 'home', color: '#4CAF50' },
  { id: 'mantra', title: 'Mantra Guide', icon: 'musical-notes', color: '#7B2FBE' },
  { id: 'dream', title: 'Dream Analysis', icon: 'moon', color: '#00C9B1' },
  { id: 'crystal', title: 'Crystal Healing', icon: 'prism', color: '#FF9800' },
];

export default function ServicesScreen() {
  const insets = useSafeAreaInsets();

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
        <Text style={styles.pageTitle}>Sacred Services</Text>
        <Text style={styles.pageSubtitle}>Ancient wisdom · Modern clarity</Text>

        {/* Main Services */}
        {SERVICES.map(service => (
          <TouchableOpacity
            key={service.id}
            style={[styles.serviceCard, { borderLeftColor: service.color, borderLeftWidth: 3 }]}
            onPress={() => router.push(service.route as any)}
            activeOpacity={0.8}
          >
            <View style={[styles.serviceIcon, { backgroundColor: service.color + '22' }]}>
              <Ionicons name={service.icon as any} size={26} color={service.color} />
            </View>
            <View style={styles.serviceText}>
              <Text style={styles.serviceBadge}>{service.subtitle}</Text>
              <Text style={styles.serviceTitle}>{service.title}</Text>
              <Text style={styles.serviceDesc}>{service.description}</Text>
            </View>
            <Ionicons name="chevron-forward" size={20} color={Colors.textMuted} />
          </TouchableOpacity>
        ))}

        {/* Astro Tools Grid */}
        <Text style={styles.sectionTitle}>Astro Tools</Text>
        <View style={styles.toolsGrid}>
          {ASTRO_TOOLS.map(tool => (
            <TouchableOpacity key={tool.id} style={styles.toolCard} activeOpacity={0.75}>
              <View style={[styles.toolIcon, { backgroundColor: tool.color + '22' }]}>
                <Ionicons name={tool.icon as any} size={22} color={tool.color} />
              </View>
              <Text style={styles.toolTitle}>{tool.title}</Text>
            </TouchableOpacity>
          ))}
        </View>

        {/* Banner */}
        <View style={styles.banner}>
          <MaterialCommunityIcons name="star-four-points" size={28} color={Colors.accentLight} />
          <View style={{ flex: 1 }}>
            <Text style={styles.bannerTitle}>Premium Readings</Text>
            <Text style={styles.bannerText}>Unlock personalized AI-powered cosmic insights and live astrologer consultations.</Text>
          </View>
          <TouchableOpacity style={styles.bannerBtn} activeOpacity={0.8}>
            <Text style={styles.bannerBtnText}>Explore</Text>
          </TouchableOpacity>
        </View>
      </ScrollView>
    </GradientBackground>
  );
}

const styles = StyleSheet.create({
  scroll: { flex: 1 },
  content: { paddingHorizontal: 16 },
  pageTitle: { fontFamily: 'Inter_700Bold', fontSize: 28, color: Colors.text, marginBottom: 4 },
  pageSubtitle: { fontFamily: 'Inter_400Regular', fontSize: 14, color: Colors.textSecondary, marginBottom: 24 },
  serviceCard: {
    flexDirection: 'row',
    alignItems: 'center',
    backgroundColor: Colors.card,
    borderRadius: 16,
    borderWidth: 1,
    borderColor: Colors.cardBorder,
    padding: 16,
    marginBottom: 12,
    gap: 14,
  },
  serviceIcon: { width: 54, height: 54, borderRadius: 14, alignItems: 'center', justifyContent: 'center' },
  serviceText: { flex: 1 },
  serviceBadge: { fontFamily: 'Inter_500Medium', fontSize: 10, color: Colors.accentLight, textTransform: 'uppercase', letterSpacing: 0.8, marginBottom: 3 },
  serviceTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 16, color: Colors.text, marginBottom: 4 },
  serviceDesc: { fontFamily: 'Inter_400Regular', fontSize: 12, color: Colors.textSecondary, lineHeight: 18 },
  sectionTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 17, color: Colors.text, marginTop: 8, marginBottom: 14 },
  toolsGrid: { flexDirection: 'row', flexWrap: 'wrap', gap: 10, marginBottom: 24 },
  toolCard: {
    width: '31%',
    alignItems: 'center',
    backgroundColor: Colors.card,
    borderRadius: 14,
    borderWidth: 1,
    borderColor: Colors.cardBorder,
    paddingVertical: 16,
    gap: 8,
  },
  toolIcon: { width: 44, height: 44, borderRadius: 22, alignItems: 'center', justifyContent: 'center' },
  toolTitle: { fontFamily: 'Inter_500Medium', fontSize: 11, color: Colors.text, textAlign: 'center' },
  banner: {
    flexDirection: 'row',
    alignItems: 'center',
    backgroundColor: 'rgba(201,168,76,0.12)',
    borderRadius: 16,
    borderWidth: 1,
    borderColor: 'rgba(201,168,76,0.3)',
    padding: 16,
    gap: 14,
  },
  bannerTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 15, color: Colors.accentLight, marginBottom: 4 },
  bannerText: { fontFamily: 'Inter_400Regular', fontSize: 12, color: Colors.textSecondary, lineHeight: 18 },
  bannerBtn: { backgroundColor: Colors.accentLight, borderRadius: 10, paddingHorizontal: 14, paddingVertical: 10 },
  bannerBtnText: { fontFamily: 'Inter_600SemiBold', fontSize: 13, color: Colors.primaryDark },
});

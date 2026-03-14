import React, { useState } from 'react';
import {
  View, Text, StyleSheet, ScrollView, TouchableOpacity,
  TextInput, Platform, Alert,
} from 'react-native';
import { Ionicons } from '@expo/vector-icons';
import { useSafeAreaInsets } from 'react-native-safe-area-context';
import { GradientBackground } from '@/components/GradientBackground';
import { Colors } from '@/constants/colors';
import { useUser } from '@/context/UserContext';
import { ZODIAC_SIGNS, getZodiacByBirthDate, getNumerologyNumber } from '@/utils/astrology';

const WEB_TOP = Platform.OS === 'web' ? 67 : 0;
const WEB_BOTTOM = Platform.OS === 'web' ? 34 : 0;

function ProfileField({ label, value, onChangeText, placeholder, keyboardType }: {
  label: string;
  value: string;
  onChangeText: (t: string) => void;
  placeholder?: string;
  keyboardType?: 'default' | 'email-address' | 'phone-pad';
}) {
  return (
    <View style={styles.fieldContainer}>
      <Text style={styles.fieldLabel}>{label}</Text>
      <TextInput
        style={styles.fieldInput}
        value={value}
        onChangeText={onChangeText}
        placeholder={placeholder || label}
        placeholderTextColor={Colors.textMuted}
        keyboardType={keyboardType || 'default'}
      />
    </View>
  );
}

export default function ProfileScreen() {
  const insets = useSafeAreaInsets();
  const { profile, updateProfile, isProfileComplete } = useUser();

  const [name, setName] = useState(profile.name);
  const [birthDate, setBirthDate] = useState(profile.birthDate);
  const [birthTime, setBirthTime] = useState(profile.birthTime);
  const [birthPlace, setBirthPlace] = useState(profile.birthPlace);

  const handleSave = () => {
    const zodiac = getZodiacByBirthDate(birthDate);
    const num = getNumerologyNumber(birthDate);
    updateProfile({ name, birthDate, birthTime, birthPlace, zodiacSign: zodiac, numerologyNumber: num });
    Alert.alert('Profile Saved', 'Your cosmic profile has been updated!');
  };

  const userSign = ZODIAC_SIGNS.find(z => z.sign === profile.zodiacSign);

  return (
    <GradientBackground>
      <ScrollView
        style={styles.scroll}
        contentContainerStyle={[
          styles.content,
          { paddingTop: insets.top + WEB_TOP + 16, paddingBottom: insets.bottom + WEB_BOTTOM + 100 }
        ]}
        showsVerticalScrollIndicator={false}
        keyboardShouldPersistTaps="handled"
      >
        <Text style={styles.pageTitle}>Your Profile</Text>
        <Text style={styles.pageSubtitle}>Personalize your cosmic journey</Text>

        {/* Avatar + Sign */}
        <View style={styles.avatarSection}>
          <View style={styles.avatarCircle}>
            {userSign ? (
              <Text style={[styles.avatarSymbol, { color: userSign.color }]}>{userSign.symbol}</Text>
            ) : (
              <Ionicons name="person" size={40} color={Colors.textSecondary} />
            )}
          </View>
          <View style={styles.avatarInfo}>
            <Text style={styles.avatarName}>{profile.name || 'Your Name'}</Text>
            {userSign && (
              <Text style={styles.avatarSign}>{userSign.name} · {userSign.element}</Text>
            )}
            {profile.numerologyNumber && (
              <Text style={styles.avatarNum}>Life Path: {profile.numerologyNumber}</Text>
            )}
          </View>
        </View>

        {/* Completion Banner */}
        {!isProfileComplete && (
          <View style={styles.completionBanner}>
            <Ionicons name="information-circle" size={20} color={Colors.accentLight} />
            <Text style={styles.completionText}>Complete your profile to unlock personalized readings</Text>
          </View>
        )}

        {/* Form */}
        <View style={styles.formCard}>
          <Text style={styles.formTitle}>Birth Details</Text>
          <ProfileField label="Full Name" value={name} onChangeText={setName} placeholder="Enter your name" />
          <ProfileField label="Date of Birth" value={birthDate} onChangeText={setBirthDate} placeholder="YYYY-MM-DD" />
          <ProfileField label="Time of Birth" value={birthTime} onChangeText={setBirthTime} placeholder="HH:MM (24hr)" />
          <ProfileField label="Place of Birth" value={birthPlace} onChangeText={setBirthPlace} placeholder="City, Country" />

          <TouchableOpacity style={styles.saveBtn} onPress={handleSave} activeOpacity={0.8}>
            <Ionicons name="checkmark-circle" size={20} color={Colors.primaryDark} />
            <Text style={styles.saveBtnText}>Save Profile</Text>
          </TouchableOpacity>
        </View>

        {/* Zodiac Selector */}
        {profile.zodiacSign && userSign && (
          <View style={styles.zodiacCard}>
            <Text style={styles.zodiacCardTitle}>Your Cosmic Identity</Text>
            <View style={styles.zodiacCardRow}>
              <View style={[styles.zodiacIconBig, { backgroundColor: userSign.color + '22' }]}>
                <Text style={[styles.zodiacSymbolBig, { color: userSign.color }]}>{userSign.symbol}</Text>
              </View>
              <View>
                <Text style={styles.zodiacCardSign}>{userSign.name}</Text>
                <Text style={styles.zodiacCardMeta}>{userSign.dates}</Text>
                <Text style={styles.zodiacCardMeta}>Ruled by {userSign.planet}</Text>
                <Text style={styles.zodiacCardMeta}>{userSign.element} Element</Text>
              </View>
            </View>
            {profile.numerologyNumber && (
              <View style={styles.numRow}>
                <Text style={styles.numLabel}>Life Path Number</Text>
                <View style={styles.numBadge}>
                  <Text style={styles.numValue}>{profile.numerologyNumber}</Text>
                </View>
              </View>
            )}
          </View>
        )}

        {/* Settings */}
        <View style={styles.settingsCard}>
          <Text style={styles.settingsTitle}>Settings</Text>
          {[
            { icon: 'notifications', label: 'Daily Horoscope Notifications' },
            { icon: 'moon', label: 'Dark Mode' },
            { icon: 'lock-closed', label: 'Privacy Policy' },
            { icon: 'help-circle', label: 'Help & Support' },
            { icon: 'information-circle', label: 'About Blessings School' },
          ].map((item, i) => (
            <TouchableOpacity key={item.label} style={[styles.settingsItem, i === 4 && { borderBottomWidth: 0 }]} activeOpacity={0.7}>
              <Ionicons name={item.icon as any} size={20} color={Colors.accentLight} />
              <Text style={styles.settingsLabel}>{item.label}</Text>
              <Ionicons name="chevron-forward" size={18} color={Colors.textMuted} />
            </TouchableOpacity>
          ))}
        </View>

        {/* App Info */}
        <View style={styles.appInfo}>
          <Text style={styles.appInfoName}>Blessings School of Hypnosis</Text>
          <Text style={styles.appInfoVersion}>Version 1.0.0</Text>
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
  avatarSection: {
    flexDirection: 'row',
    alignItems: 'center',
    gap: 18,
    marginBottom: 20,
  },
  avatarCircle: {
    width: 80,
    height: 80,
    borderRadius: 40,
    backgroundColor: 'rgba(201,168,76,0.15)',
    borderWidth: 2,
    borderColor: 'rgba(201,168,76,0.4)',
    alignItems: 'center',
    justifyContent: 'center',
  },
  avatarSymbol: { fontSize: 40 },
  avatarInfo: { flex: 1 },
  avatarName: { fontFamily: 'Inter_700Bold', fontSize: 22, color: Colors.text, marginBottom: 4 },
  avatarSign: { fontFamily: 'Inter_500Medium', fontSize: 14, color: Colors.accentLight },
  avatarNum: { fontFamily: 'Inter_400Regular', fontSize: 13, color: Colors.textSecondary },
  completionBanner: {
    flexDirection: 'row',
    alignItems: 'center',
    gap: 10,
    backgroundColor: 'rgba(201,168,76,0.12)',
    borderRadius: 12,
    padding: 14,
    marginBottom: 20,
    borderWidth: 1,
    borderColor: 'rgba(201,168,76,0.25)',
  },
  completionText: { fontFamily: 'Inter_400Regular', fontSize: 13, color: Colors.textSecondary, flex: 1 },
  formCard: {
    backgroundColor: Colors.card,
    borderRadius: 18,
    borderWidth: 1,
    borderColor: Colors.cardBorder,
    padding: 18,
    marginBottom: 20,
  },
  formTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 16, color: Colors.text, marginBottom: 16 },
  fieldContainer: { marginBottom: 14 },
  fieldLabel: { fontFamily: 'Inter_500Medium', fontSize: 12, color: Colors.textSecondary, marginBottom: 6, textTransform: 'uppercase', letterSpacing: 0.5 },
  fieldInput: {
    backgroundColor: 'rgba(255,255,255,0.06)',
    borderRadius: 10,
    borderWidth: 1,
    borderColor: Colors.cardBorder,
    paddingHorizontal: 14,
    paddingVertical: 12,
    fontFamily: 'Inter_400Regular',
    fontSize: 15,
    color: Colors.text,
  },
  saveBtn: {
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'center',
    backgroundColor: Colors.accentLight,
    borderRadius: 12,
    paddingVertical: 14,
    gap: 8,
    marginTop: 6,
  },
  saveBtnText: { fontFamily: 'Inter_600SemiBold', fontSize: 16, color: Colors.primaryDark },
  zodiacCard: {
    backgroundColor: Colors.card,
    borderRadius: 18,
    borderWidth: 1,
    borderColor: Colors.cardBorder,
    padding: 18,
    marginBottom: 20,
  },
  zodiacCardTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 15, color: Colors.accentLight, marginBottom: 14 },
  zodiacCardRow: { flexDirection: 'row', alignItems: 'center', gap: 18, marginBottom: 14 },
  zodiacIconBig: { width: 70, height: 70, borderRadius: 35, alignItems: 'center', justifyContent: 'center' },
  zodiacSymbolBig: { fontSize: 40 },
  zodiacCardSign: { fontFamily: 'Inter_700Bold', fontSize: 22, color: Colors.text },
  zodiacCardMeta: { fontFamily: 'Inter_400Regular', fontSize: 13, color: Colors.textSecondary, marginTop: 3 },
  numRow: { flexDirection: 'row', alignItems: 'center', justifyContent: 'space-between', borderTopWidth: 1, borderTopColor: Colors.cardBorder, paddingTop: 14 },
  numLabel: { fontFamily: 'Inter_500Medium', fontSize: 14, color: Colors.textSecondary },
  numBadge: { width: 42, height: 42, borderRadius: 21, backgroundColor: 'rgba(201,168,76,0.2)', alignItems: 'center', justifyContent: 'center', borderWidth: 1, borderColor: 'rgba(201,168,76,0.4)' },
  numValue: { fontFamily: 'Inter_700Bold', fontSize: 18, color: Colors.accentLight },
  settingsCard: { backgroundColor: Colors.card, borderRadius: 18, borderWidth: 1, borderColor: Colors.cardBorder, padding: 18, marginBottom: 20 },
  settingsTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 15, color: Colors.text, marginBottom: 14 },
  settingsItem: { flexDirection: 'row', alignItems: 'center', gap: 14, paddingVertical: 14, borderBottomWidth: 1, borderBottomColor: Colors.cardBorder },
  settingsLabel: { flex: 1, fontFamily: 'Inter_400Regular', fontSize: 15, color: Colors.text },
  appInfo: { alignItems: 'center', marginBottom: 10 },
  appInfoName: { fontFamily: 'Inter_600SemiBold', fontSize: 14, color: Colors.textSecondary },
  appInfoVersion: { fontFamily: 'Inter_400Regular', fontSize: 12, color: Colors.textMuted, marginTop: 4 },
});

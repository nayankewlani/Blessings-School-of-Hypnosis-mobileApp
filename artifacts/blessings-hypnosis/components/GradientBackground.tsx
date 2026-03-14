import React from 'react';
import { View, StyleSheet, ViewStyle } from 'react-native';
import { Colors } from '@/constants/colors';

interface Props {
  children: React.ReactNode;
  style?: ViewStyle;
  variant?: 'primary' | 'deep' | 'card';
}

export function GradientBackground({ children, style, variant = 'primary' }: Props) {
  const bgColors = {
    primary: Colors.primary,
    deep: Colors.primaryDark,
    card: Colors.card,
  };

  return (
    <View style={[styles.container, { backgroundColor: bgColors[variant] }, style]}>
      <View style={styles.orb1} />
      <View style={styles.orb2} />
      <View style={styles.orb3} />
      {children}
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    overflow: 'hidden',
  },
  orb1: {
    position: 'absolute',
    top: -80,
    right: -60,
    width: 220,
    height: 220,
    borderRadius: 110,
    backgroundColor: 'rgba(123,47,190,0.18)',
  },
  orb2: {
    position: 'absolute',
    bottom: 100,
    left: -80,
    width: 280,
    height: 280,
    borderRadius: 140,
    backgroundColor: 'rgba(0,201,177,0.09)',
  },
  orb3: {
    position: 'absolute',
    top: '40%',
    right: -40,
    width: 150,
    height: 150,
    borderRadius: 75,
    backgroundColor: 'rgba(201,168,76,0.08)',
  },
});

import React, { createContext, useContext, useState, useEffect, ReactNode } from 'react';
import AsyncStorage from '@react-native-async-storage/async-storage';

export type ZodiacSign = 
  | 'aries' | 'taurus' | 'gemini' | 'cancer' | 'leo' | 'virgo'
  | 'libra' | 'scorpio' | 'sagittarius' | 'capricorn' | 'aquarius' | 'pisces';

export interface UserProfile {
  name: string;
  birthDate: string;
  birthTime: string;
  birthPlace: string;
  zodiacSign: ZodiacSign | null;
  numerologyNumber: number | null;
  favoriteReadings: string[];
}

interface UserContextType {
  profile: UserProfile;
  updateProfile: (updates: Partial<UserProfile>) => void;
  addFavorite: (reading: string) => void;
  removeFavorite: (reading: string) => void;
  isProfileComplete: boolean;
}

const defaultProfile: UserProfile = {
  name: '',
  birthDate: '',
  birthTime: '',
  birthPlace: '',
  zodiacSign: null,
  numerologyNumber: null,
  favoriteReadings: [],
};

const UserContext = createContext<UserContextType | null>(null);

export function UserProvider({ children }: { children: ReactNode }) {
  const [profile, setProfile] = useState<UserProfile>(defaultProfile);

  useEffect(() => {
    AsyncStorage.getItem('user_profile').then((data) => {
      if (data) {
        try {
          setProfile(JSON.parse(data));
        } catch {}
      }
    });
  }, []);

  const updateProfile = (updates: Partial<UserProfile>) => {
    setProfile((prev) => {
      const next = { ...prev, ...updates };
      AsyncStorage.setItem('user_profile', JSON.stringify(next));
      return next;
    });
  };

  const addFavorite = (reading: string) => {
    setProfile((prev) => {
      if (prev.favoriteReadings.includes(reading)) return prev;
      const next = { ...prev, favoriteReadings: [...prev.favoriteReadings, reading] };
      AsyncStorage.setItem('user_profile', JSON.stringify(next));
      return next;
    });
  };

  const removeFavorite = (reading: string) => {
    setProfile((prev) => {
      const next = { ...prev, favoriteReadings: prev.favoriteReadings.filter(r => r !== reading) };
      AsyncStorage.setItem('user_profile', JSON.stringify(next));
      return next;
    });
  };

  const isProfileComplete = !!(profile.name && profile.birthDate && profile.zodiacSign);

  return (
    <UserContext.Provider value={{ profile, updateProfile, addFavorite, removeFavorite, isProfileComplete }}>
      {children}
    </UserContext.Provider>
  );
}

export function useUser() {
  const ctx = useContext(UserContext);
  if (!ctx) throw new Error('useUser must be used within UserProvider');
  return ctx;
}

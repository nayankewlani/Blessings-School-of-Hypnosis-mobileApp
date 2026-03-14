# Blessings School of Hypnosis — Key Points & Features

> Edit this file freely. It serves as your editable reference document for the app.

---

## App Identity

- **App Name:** Blessings School of Hypnosis
- **Platform:** Android, iOS, Web (Expo React Native)
- **Version:** 1.0.0
- **Color Theme:** Deep Indigo (#1A0A3C) + Gold (#C9A84C) + Teal (#00C9B1)

---

## Core Features

### 1. Horoscopes
- Daily, weekly, and monthly readings for all 12 zodiac signs
- Aspects covered: Love, Career, Health, General fortune
- Lucky numbers and compatible signs included
- Auto-detects user's zodiac sign from birth date

### 2. Kundali (Vedic Birth Chart)
- 12-house planetary grid layout
- Planet positions: Sun, Moon, Mars, Mercury, Jupiter, Venus, Saturn, Rahu, Ketu
- Dasha period table (life prediction timeline)
- Uses birth date, time, and place

### 3. Numerology
- Life Path Number calculation (1–9, 11, 22)
- Full meaning breakdown: title, description, strengths, challenges
- Compatibility list per number
- Core numbers: Expression, Soul Urge, Personality

### 4. Tarot
- Full 78-card deck (Major and Minor Arcana)
- 3D card flip animation
- Spread options: Single card, Three-card, Celtic cross
- Upright and reversed meanings for every card

### 5. Panchang (Hindu Calendar)
- Daily Tithi (lunar day)
- Nakshatra (lunar mansion)
- Yoga and Karana values
- Auspicious Muhurta time windows
- Mini monthly calendar view

### 6. Hypnosis Sessions
- Categorized session library (sleep, focus, confidence, stress relief)
- Animated breathing exercise (inhale/hold/exhale cycle)
- Full-screen modal session player with countdown timer
- Progress tracking during session

### 7. Guided Meditation
- Animated pulsing timer circle
- Multiple session types and durations
- Completion sound cue
- Breathing cycle timings per session

### 8. User Profile
- Name, birth date, birth time, birth place
- Auto-calculates zodiac sign on save
- Auto-calculates life path number on save
- All data stored locally on device (no account needed)

---

## Technical Key Points

| Point | Detail |
|---|---|
| No backend | All data is local — app works 100% offline |
| No login | No account or registration required |
| Persists data | AsyncStorage saves profile between sessions |
| File-based routing | Every file in `app/` is a route automatically |
| Cross-platform | Same codebase runs on Android, iOS, and Web |
| Dark mode | Dark UI enforced globally via app.json |
| Safe area aware | All screens use `useSafeAreaInsets()` for notch/nav bar |
| Crash recovery | ErrorBoundary wraps every screen |

---

## Architecture Summary

```
Root (_layout.tsx)
├── UserProvider (UserContext + AsyncStorage)
├── QueryClientProvider (TanStack Query)
└── Stack Navigator (Expo Router)
    └── Tab Navigator ((tabs)/_layout.tsx)
        ├── Home (index.tsx)
        ├── Horoscope (horoscope.tsx) → horoscope/[sign]
        ├── Services (services.tsx) → kundali/, numerology/, tarot/, panchang/
        ├── Hypnosis (hypnosis.tsx) → meditation/
        └── Profile (profile.tsx)
```

---

## Utility Functions (utils/astrology.ts)

| Function | Purpose |
|---|---|
| `getZodiacSign(birthDate)` | Calculate zodiac sign from any Date |
| `getHoroscope(sign, period)` | Get daily/weekly/monthly reading |
| `getTarotCard(index)` | Get card data from 78-card deck |
| `getLifePathNumber(birthDate)` | Calculate numerology life path number |
| `getNumerologyMeaning(number)` | Get full meaning for a life path number |
| `getPanchang(date)` | Get Hindu calendar data for any date |
| `getHypnosisSessions()` | Get full list of hypnosis sessions |
| `getMeditationTrack(type)` | Get meditation track metadata |

---

## Future Enhancement Ideas

- [ ] Add push notifications for daily horoscope
- [ ] Add audio tracks for hypnosis sessions
- [ ] Add compatibility reports between two birth dates
- [ ] Add yearly horoscope readings
- [ ] Add palmistry / hand analysis feature
- [ ] Add dream journal with interpretation
- [ ] Add Chakra balance assessment

---

*Last updated: March 2026*

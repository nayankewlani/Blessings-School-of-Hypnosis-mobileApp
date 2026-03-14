import React, { useState, useRef } from 'react';
import {
  View, Text, StyleSheet, ScrollView, TouchableOpacity,
  Platform, Animated, Dimensions,
} from 'react-native';
import { Ionicons } from '@expo/vector-icons';
import { router } from 'expo-router';
import { useSafeAreaInsets } from 'react-native-safe-area-context';
import { GradientBackground } from '@/components/GradientBackground';
import { Colors } from '@/constants/colors';
import { TAROT_CARDS } from '@/utils/astrology';

const WEB_TOP = Platform.OS === 'web' ? 67 : 0;
const WEB_BOTTOM = Platform.OS === 'web' ? 34 : 0;
const { width } = Dimensions.get('window');

const TAROT_SPREADS = [
  { id: 'one', name: 'One Card', count: 1, description: 'Quick daily guidance' },
  { id: 'three', name: 'Three Card', count: 3, description: 'Past · Present · Future' },
  { id: 'celtic', name: 'Celtic Cross', count: 5, description: 'Deep life situation' },
];

const CARD_COLORS = ['#7B2FBE', '#C9A84C', '#00C9B1', '#FF6B6B', '#4CAF50'];

function TarotCard({ card, isRevealed, onPress, index }: {
  card: typeof TAROT_CARDS[0] | null;
  isRevealed: boolean;
  onPress: () => void;
  index: number;
}) {
  const flipAnim = useRef(new Animated.Value(0)).current;
  const [flipped, setFlipped] = useState(false);

  const handleFlip = () => {
    if (!card) return;
    Animated.timing(flipAnim, {
      toValue: flipped ? 0 : 1,
      duration: 400,
      useNativeDriver: true,
    }).start(() => setFlipped(!flipped));
    onPress();
  };

  const frontRotate = flipAnim.interpolate({ inputRange: [0, 1], outputRange: ['0deg', '180deg'] });
  const backRotate = flipAnim.interpolate({ inputRange: [0, 1], outputRange: ['180deg', '360deg'] });
  const color = CARD_COLORS[index % CARD_COLORS.length];

  return (
    <TouchableOpacity onPress={handleFlip} activeOpacity={0.9} style={styles.cardWrapper}>
      {/* Back face (unrevealed) */}
      <Animated.View
        style={[
          styles.tarotCard,
          styles.cardBack,
          { transform: [{ rotateY: frontRotate }] },
          !isRevealed && { opacity: 1 },
        ]}
      >
        <View style={styles.cardBackPattern}>
          {[...Array(5)].map((_, i) => (
            <View key={i} style={[styles.backLine, { opacity: 0.3 - i * 0.05 }]} />
          ))}
          <Text style={styles.cardBackSymbol}>✦</Text>
        </View>
        <Text style={styles.cardBackText}>Tap to Reveal</Text>
      </Animated.View>

      {/* Front face (revealed) */}
      {card && (
        <Animated.View
          style={[
            styles.tarotCard,
            styles.cardFront,
            { transform: [{ rotateY: backRotate }], borderColor: color + '80', position: 'absolute' }
          ]}
        >
          <View style={[styles.cardTopBorder, { backgroundColor: color }]} />
          <Text style={[styles.cardNumber, { color: color }]}>{ card.number}</Text>
          <View style={[styles.cardSymbolCircle, { backgroundColor: color + '22' }]}>
            <Text style={[styles.cardFrontSymbol, { color }]}>✦</Text>
          </View>
          <Text style={styles.cardName}>{card.name}</Text>
        </Animated.View>
      )}
    </TouchableOpacity>
  );
}

export default function TarotScreen() {
  const insets = useSafeAreaInsets();
  const [selectedSpread, setSelectedSpread] = useState(0);
  const [drawnCards, setDrawnCards] = useState<typeof TAROT_CARDS>([]);
  const [revealedIndexes, setRevealedIndexes] = useState<number[]>([]);
  const [question, setQuestion] = useState('');

  const spreadCount = TAROT_SPREADS[selectedSpread].count;

  const shuffleAndDraw = () => {
    const shuffled = [...TAROT_CARDS].sort(() => Math.random() - 0.5);
    setDrawnCards(shuffled.slice(0, spreadCount));
    setRevealedIndexes([]);
  };

  const revealCard = (index: number) => {
    setRevealedIndexes(prev => prev.includes(index) ? prev : [...prev, index]);
  };

  const POSITION_LABELS = ['Past', 'Present', 'Future', 'Guidance', 'Outcome'];

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
          <Text style={styles.backText}>Tarot Reading</Text>
        </TouchableOpacity>

        <Text style={styles.subtitle}>Divine guidance through sacred cards</Text>

        {/* Spread Selection */}
        <View style={styles.spreadRow}>
          {TAROT_SPREADS.map((s, i) => (
            <TouchableOpacity
              key={s.id}
              style={[styles.spreadCard, i === selectedSpread && styles.spreadCardActive]}
              onPress={() => { setSelectedSpread(i); setDrawnCards([]); setRevealedIndexes([]); }}
            >
              <Text style={[styles.spreadCount, i === selectedSpread && { color: Colors.accentLight }]}>{s.count}</Text>
              <Text style={[styles.spreadName, i === selectedSpread && { color: Colors.text }]}>{s.name}</Text>
              <Text style={styles.spreadDesc}>{s.description}</Text>
            </TouchableOpacity>
          ))}
        </View>

        {/* Question Prompt */}
        <View style={styles.questionCard}>
          <Ionicons name="help-circle" size={20} color={Colors.violetLight} />
          <Text style={styles.questionText}>
            Hold your question in mind before drawing the cards. The Universe responds to focused intention.
          </Text>
        </View>

        {/* Draw Button */}
        <TouchableOpacity style={styles.drawBtn} onPress={shuffleAndDraw} activeOpacity={0.85}>
          <Ionicons name="sparkles" size={20} color={Colors.primaryDark} />
          <Text style={styles.drawBtnText}>
            {drawnCards.length > 0 ? 'Draw Again' : 'Shuffle & Draw'}
          </Text>
        </TouchableOpacity>

        {/* Cards Display */}
        {drawnCards.length > 0 && (
          <View style={styles.cardsArea}>
            {spreadCount === 1 ? (
              <View style={{ alignItems: 'center' }}>
                <Text style={styles.positionLabel}>Your Card</Text>
                <TarotCard
                  card={drawnCards[0]}
                  isRevealed={revealedIndexes.includes(0)}
                  onPress={() => revealCard(0)}
                  index={0}
                />
              </View>
            ) : (
              <View style={styles.cardsRow}>
                {drawnCards.map((card, i) => (
                  <View key={i} style={styles.cardColumn}>
                    <Text style={styles.positionLabel}>{POSITION_LABELS[i]}</Text>
                    <TarotCard
                      card={card}
                      isRevealed={revealedIndexes.includes(i)}
                      onPress={() => revealCard(i)}
                      index={i}
                    />
                  </View>
                ))}
              </View>
            )}
          </View>
        )}

        {/* Revealed Card Details */}
        {revealedIndexes.map(i => {
          const card = drawnCards[i];
          if (!card) return null;
          const color = CARD_COLORS[i % CARD_COLORS.length];
          return (
            <View key={i} style={[styles.cardDetailCard, { borderLeftColor: color, borderLeftWidth: 3 }]}>
              <View style={styles.cardDetailHeader}>
                <Text style={[styles.cardDetailName, { color }]}>{card.name}</Text>
                {spreadCount > 1 && <Text style={styles.cardDetailPosition}>{POSITION_LABELS[i]}</Text>}
              </View>
              <View style={styles.cardDetailSection}>
                <Text style={styles.cardDetailLabel}>Upright Meaning</Text>
                <Text style={styles.cardDetailText}>{card.meaning}</Text>
              </View>
              <View style={styles.cardDetailSection}>
                <Text style={styles.cardDetailLabel}>Reversed Meaning</Text>
                <Text style={styles.cardDetailText}>{card.reversed}</Text>
              </View>
            </View>
          );
        })}

        {/* All Cards Reference */}
        <Text style={styles.sectionTitle}>Major Arcana Reference</Text>
        {TAROT_CARDS.map((card, i) => (
          <View key={card.name} style={styles.referenceCard}>
            <View style={[styles.referenceNum, { backgroundColor: CARD_COLORS[i % 5] + '22' }]}>
              <Text style={[styles.referenceNumText, { color: CARD_COLORS[i % 5] }]}>{card.number}</Text>
            </View>
            <View style={styles.referenceInfo}>
              <Text style={styles.referenceName}>{card.name}</Text>
              <Text style={styles.referenceMeaning} numberOfLines={2}>{card.meaning}</Text>
            </View>
          </View>
        ))}
      </ScrollView>
    </GradientBackground>
  );
}

const cardW = Math.min(140, (width - 48) / 2);
const cardH = cardW * 1.6;

const styles = StyleSheet.create({
  scroll: { flex: 1 },
  content: { paddingHorizontal: 16 },
  backBtn: { flexDirection: 'row', alignItems: 'center', gap: 8, marginBottom: 8 },
  backText: { fontFamily: 'Inter_700Bold', fontSize: 20, color: Colors.text },
  subtitle: { fontFamily: 'Inter_400Regular', fontSize: 14, color: Colors.textSecondary, marginBottom: 24 },
  spreadRow: { flexDirection: 'row', gap: 10, marginBottom: 20 },
  spreadCard: { flex: 1, backgroundColor: Colors.card, borderRadius: 14, borderWidth: 1, borderColor: Colors.cardBorder, padding: 14, alignItems: 'center', gap: 4 },
  spreadCardActive: { borderColor: Colors.accentLight, backgroundColor: 'rgba(201,168,76,0.1)' },
  spreadCount: { fontFamily: 'Inter_700Bold', fontSize: 24, color: Colors.textSecondary },
  spreadName: { fontFamily: 'Inter_600SemiBold', fontSize: 13, color: Colors.textSecondary },
  spreadDesc: { fontFamily: 'Inter_400Regular', fontSize: 11, color: Colors.textMuted, textAlign: 'center' },
  questionCard: { flexDirection: 'row', alignItems: 'flex-start', gap: 10, backgroundColor: 'rgba(123,47,190,0.12)', borderRadius: 14, padding: 14, marginBottom: 20, borderWidth: 1, borderColor: 'rgba(123,47,190,0.25)' },
  questionText: { flex: 1, fontFamily: 'Inter_400Regular', fontSize: 13, color: Colors.textSecondary, lineHeight: 20 },
  drawBtn: { flexDirection: 'row', alignItems: 'center', justifyContent: 'center', backgroundColor: Colors.accentLight, borderRadius: 14, paddingVertical: 16, gap: 10, marginBottom: 28 },
  drawBtnText: { fontFamily: 'Inter_600SemiBold', fontSize: 16, color: Colors.primaryDark },
  cardsArea: { marginBottom: 24 },
  cardsRow: { flexDirection: 'row', justifyContent: 'center', flexWrap: 'wrap', gap: 12 },
  cardColumn: { alignItems: 'center', gap: 8 },
  positionLabel: { fontFamily: 'Inter_500Medium', fontSize: 13, color: Colors.accentLight, textAlign: 'center', marginBottom: 8 },
  cardWrapper: { width: cardW, height: cardH },
  tarotCard: {
    width: cardW,
    height: cardH,
    borderRadius: 12,
    overflow: 'hidden',
    backfaceVisibility: 'hidden',
  },
  cardBack: {
    backgroundColor: 'rgba(26,10,60,0.95)',
    borderWidth: 1,
    borderColor: 'rgba(201,168,76,0.4)',
    alignItems: 'center',
    justifyContent: 'flex-end',
    paddingBottom: 16,
  },
  cardBackPattern: { position: 'absolute', top: 0, left: 0, right: 0, bottom: 0, alignItems: 'center', justifyContent: 'center' },
  backLine: { width: '80%', height: 1, backgroundColor: Colors.accentLight, marginVertical: 6 },
  cardBackSymbol: { fontSize: 32, color: Colors.accentLight, marginTop: 10 },
  cardBackText: { fontFamily: 'Inter_500Medium', fontSize: 11, color: Colors.textMuted, zIndex: 1 },
  cardFront: {
    backgroundColor: Colors.primaryLight,
    borderWidth: 1,
    alignItems: 'center',
    justifyContent: 'center',
    gap: 8,
  },
  cardTopBorder: { position: 'absolute', top: 0, left: 0, right: 0, height: 4 },
  cardNumber: { fontFamily: 'Inter_400Regular', fontSize: 12, position: 'absolute', top: 12, left: 12 },
  cardSymbolCircle: { width: 50, height: 50, borderRadius: 25, alignItems: 'center', justifyContent: 'center' },
  cardFrontSymbol: { fontSize: 24 },
  cardName: { fontFamily: 'Inter_600SemiBold', fontSize: 12, color: Colors.text, textAlign: 'center', paddingHorizontal: 8 },
  cardDetailCard: { backgroundColor: Colors.card, borderRadius: 14, borderWidth: 1, borderColor: Colors.cardBorder, padding: 16, marginBottom: 12 },
  cardDetailHeader: { flexDirection: 'row', justifyContent: 'space-between', alignItems: 'center', marginBottom: 12 },
  cardDetailName: { fontFamily: 'Inter_700Bold', fontSize: 18 },
  cardDetailPosition: { fontFamily: 'Inter_500Medium', fontSize: 12, color: Colors.textMuted },
  cardDetailSection: { marginBottom: 12 },
  cardDetailLabel: { fontFamily: 'Inter_600SemiBold', fontSize: 12, color: Colors.accentLight, textTransform: 'uppercase', letterSpacing: 0.5, marginBottom: 4 },
  cardDetailText: { fontFamily: 'Inter_400Regular', fontSize: 14, color: Colors.textSecondary, lineHeight: 21 },
  sectionTitle: { fontFamily: 'Inter_600SemiBold', fontSize: 17, color: Colors.text, marginBottom: 14, marginTop: 4 },
  referenceCard: { flexDirection: 'row', alignItems: 'center', backgroundColor: Colors.card, borderRadius: 12, borderWidth: 1, borderColor: Colors.cardBorder, padding: 12, marginBottom: 8, gap: 12 },
  referenceNum: { width: 36, height: 36, borderRadius: 18, alignItems: 'center', justifyContent: 'center' },
  referenceNumText: { fontFamily: 'Inter_700Bold', fontSize: 14 },
  referenceInfo: { flex: 1 },
  referenceName: { fontFamily: 'Inter_600SemiBold', fontSize: 14, color: Colors.text, marginBottom: 3 },
  referenceMeaning: { fontFamily: 'Inter_400Regular', fontSize: 12, color: Colors.textSecondary },
});

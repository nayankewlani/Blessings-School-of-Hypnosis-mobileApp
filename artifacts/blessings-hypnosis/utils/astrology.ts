import { ZodiacSign } from '@/context/UserContext';

export const ZODIAC_SIGNS: Array<{
  sign: ZodiacSign;
  name: string;
  symbol: string;
  element: string;
  planet: string;
  dates: string;
  color: string;
}> = [
  { sign: 'aries', name: 'Aries', symbol: '♈', element: 'Fire', planet: 'Mars', dates: 'Mar 21 - Apr 19', color: '#FF6B6B' },
  { sign: 'taurus', name: 'Taurus', symbol: '♉', element: 'Earth', planet: 'Venus', dates: 'Apr 20 - May 20', color: '#4CAF50' },
  { sign: 'gemini', name: 'Gemini', symbol: '♊', element: 'Air', planet: 'Mercury', dates: 'May 21 - Jun 20', color: '#FFD700' },
  { sign: 'cancer', name: 'Cancer', symbol: '♋', element: 'Water', planet: 'Moon', dates: 'Jun 21 - Jul 22', color: '#00BCD4' },
  { sign: 'leo', name: 'Leo', symbol: '♌', element: 'Fire', planet: 'Sun', dates: 'Jul 23 - Aug 22', color: '#FF9800' },
  { sign: 'virgo', name: 'Virgo', symbol: '♍', element: 'Earth', planet: 'Mercury', dates: 'Aug 23 - Sep 22', color: '#8BC34A' },
  { sign: 'libra', name: 'Libra', symbol: '♎', element: 'Air', planet: 'Venus', dates: 'Sep 23 - Oct 22', color: '#E91E63' },
  { sign: 'scorpio', name: 'Scorpio', symbol: '♏', element: 'Water', planet: 'Pluto', dates: 'Oct 23 - Nov 21', color: '#9C27B0' },
  { sign: 'sagittarius', name: 'Sagittarius', symbol: '♐', element: 'Fire', planet: 'Jupiter', dates: 'Nov 22 - Dec 21', color: '#FF5722' },
  { sign: 'capricorn', name: 'Capricorn', symbol: '♑', element: 'Earth', planet: 'Saturn', dates: 'Dec 22 - Jan 19', color: '#607D8B' },
  { sign: 'aquarius', name: 'Aquarius', symbol: '♒', element: 'Air', planet: 'Uranus', dates: 'Jan 20 - Feb 18', color: '#2196F3' },
  { sign: 'pisces', name: 'Pisces', symbol: '♓', element: 'Water', planet: 'Neptune', dates: 'Feb 19 - Mar 20', color: '#00BCD4' },
];

export function getZodiacByBirthDate(dateStr: string): ZodiacSign | null {
  if (!dateStr) return null;
  const date = new Date(dateStr);
  const month = date.getMonth() + 1;
  const day = date.getDate();
  if ((month === 3 && day >= 21) || (month === 4 && day <= 19)) return 'aries';
  if ((month === 4 && day >= 20) || (month === 5 && day <= 20)) return 'taurus';
  if ((month === 5 && day >= 21) || (month === 6 && day <= 20)) return 'gemini';
  if ((month === 6 && day >= 21) || (month === 7 && day <= 22)) return 'cancer';
  if ((month === 7 && day >= 23) || (month === 8 && day <= 22)) return 'leo';
  if ((month === 8 && day >= 23) || (month === 9 && day <= 22)) return 'virgo';
  if ((month === 9 && day >= 23) || (month === 10 && day <= 22)) return 'libra';
  if ((month === 10 && day >= 23) || (month === 11 && day <= 21)) return 'scorpio';
  if ((month === 11 && day >= 22) || (month === 12 && day <= 21)) return 'sagittarius';
  if ((month === 12 && day >= 22) || (month === 1 && day <= 19)) return 'capricorn';
  if ((month === 1 && day >= 20) || (month === 2 && day <= 18)) return 'aquarius';
  return 'pisces';
}

export function getNumerologyNumber(dateStr: string): number {
  if (!dateStr) return 1;
  const digits = dateStr.replace(/\D/g, '');
  let sum = digits.split('').reduce((acc, d) => acc + parseInt(d, 10), 0);
  while (sum > 9 && sum !== 11 && sum !== 22 && sum !== 33) {
    sum = sum.toString().split('').reduce((acc, d) => acc + parseInt(d, 10), 0);
  }
  return sum || 1;
}

export const HOROSCOPE_DATA: Record<ZodiacSign, {
  today: { overall: string; love: string; career: string; health: string; lucky: string; luckyNumber: number; rating: number };
}> = {
  aries: {
    today: {
      overall: 'Today brings a surge of dynamic energy. Your natural leadership qualities shine, making this an ideal time to take bold initiatives. Trust your instincts as they guide you toward meaningful opportunities.',
      love: 'Romance blooms unexpectedly. If single, you may encounter someone who shares your passions. Couples find renewed excitement by exploring new activities together.',
      career: 'Professional recognition is on the horizon. Your innovative ideas capture attention from those in authority. A bold proposal could lead to significant advancement.',
      health: 'Channel your vibrant energy into physical exercise. High-intensity activities boost both body and mind. Stay hydrated and listen to your body\'s signals.',
      lucky: 'Tuesday, Red, East direction',
      luckyNumber: 9,
      rating: 4,
    },
  },
  taurus: {
    today: {
      overall: 'Stability and comfort define your day. Venus blesses your interactions with grace and beauty. Focus on consolidating gains and nurturing what you have already built.',
      love: 'Deep emotional connections strengthen today. Express your feelings through thoughtful gestures. Your partner appreciates your unwavering loyalty and warmth.',
      career: 'Financial matters deserve attention. Your practical approach to problem-solving impresses colleagues. Steady progress leads to lasting success.',
      health: 'Indulge in nature\'s healing power. A peaceful walk or gardening session restores balance. Nourish yourself with wholesome foods.',
      lucky: 'Friday, Green, South direction',
      luckyNumber: 6,
      rating: 5,
    },
  },
  gemini: {
    today: {
      overall: 'Your mind sparkles with brilliant ideas and communication flows effortlessly. Mercury enhances your wit and adaptability. Embrace the variety that life presents today.',
      love: 'Stimulating conversations deepen romantic bonds. Your charm is magnetic and irresistible. Share your thoughts openly; vulnerability creates intimacy.',
      career: 'Networking opportunities abound. Your ability to connect diverse ideas impresses potential collaborators. A creative project gains momentum.',
      health: 'Mental agility needs grounding. Meditation or breathwork calms a busy mind. Balance intellectual pursuits with physical movement.',
      lucky: 'Wednesday, Yellow, West direction',
      luckyNumber: 5,
      rating: 4,
    },
  },
  cancer: {
    today: {
      overall: 'Intuition runs exceptionally strong today. The Moon amplifies your emotional sensitivity and psychic awareness. Trust what your heart whispers in quiet moments.',
      love: 'Nurturing energy creates beautiful moments of closeness. Your empathy draws others near. Home and family bring profound joy and meaning.',
      career: 'Creative projects flourish under lunar influence. Your emotional intelligence helps resolve workplace tensions. A mentor offers valuable guidance.',
      health: 'Emotional well-being takes priority. Create a sanctuary of calm in your environment. Healing baths or gentle yoga support inner harmony.',
      lucky: 'Monday, Silver, North direction',
      luckyNumber: 2,
      rating: 4,
    },
  },
  leo: {
    today: {
      overall: 'The Sun ignites your magnificence today. Your radiant confidence attracts admiration and opens doors. Step into the spotlight with grace and authentic power.',
      love: 'Passionate connections deepen and new romance sparkles. Your generous heart creates magical experiences. Love is grand and theatrical in the best way.',
      career: 'Leadership opportunities arise naturally. Your creative vision inspires others to follow. Recognition and praise reward your dedication.',
      health: 'Vitality soars to magnificent heights. Engage in activities that make your heart sing. Radiate wellness through joyful self-expression.',
      lucky: 'Sunday, Gold, Center direction',
      luckyNumber: 1,
      rating: 5,
    },
  },
  virgo: {
    today: {
      overall: 'Precision and discernment guide your actions beautifully. Your analytical gifts help solve complex problems. Order and clarity emerge from any chaos you encounter.',
      love: 'Thoughtful acts of service express your deep love. Small, meaningful gestures touch hearts more than grand gestures. Your loyalty proves its worth.',
      career: 'Detail-oriented work yields exceptional results. Your meticulous approach catches important issues others miss. Professional credibility strengthens.',
      health: 'Wellness routines established today create lasting benefits. Nutrition and digestive health deserve attention. Purification practices cleanse and renew.',
      lucky: 'Wednesday, Navy Blue, Northwest direction',
      luckyNumber: 5,
      rating: 4,
    },
  },
  libra: {
    today: {
      overall: 'Balance and beauty surround you as Venus weaves her magic. Diplomatic solutions emerge naturally from your graceful perspective. Harmony is your greatest gift.',
      love: 'Partnership energy peaks magnificently. Your ability to see both sides creates understanding and peace. New love possibilities shimmer on the horizon.',
      career: 'Collaborative ventures bring outstanding results. Your charm smooths negotiations and builds bridges. Aesthetic judgments prove valuable.',
      health: 'Balance in all things supports well-being. Pair physical movement with artistic expression. Beauty and symmetry nourish your soul.',
      lucky: 'Friday, Pink, East direction',
      luckyNumber: 6,
      rating: 5,
    },
  },
  scorpio: {
    today: {
      overall: 'Pluto intensifies your transformative powers today. Deep truths surface, bringing liberation and power. Your penetrating insight reveals what others cannot see.',
      love: 'Magnetic attraction reaches its peak intensity. Deep emotional bonds form or deepen significantly. Secrets shared in trust create unbreakable connections.',
      career: 'Research and investigation yield powerful discoveries. Your strategic mind outmaneuvers obstacles effortlessly. Hidden information works in your favor.',
      health: 'Detoxification and renewal support deep healing. Eliminate what no longer serves your highest good. Transformative healing modalities prove effective.',
      lucky: 'Tuesday, Dark Red, Southwest direction',
      luckyNumber: 8,
      rating: 4,
    },
  },
  sagittarius: {
    today: {
      overall: 'Jupiter expands your world with wisdom and adventure. Philosophical insights and far horizons call to your wandering spirit. Freedom and truth light your path.',
      love: 'Adventurous spirits connect through shared exploration. Your optimism and humor create joy in relationships. Cross-cultural connections carry special meaning.',
      career: 'Higher education, travel, or publishing opportunities emerge. Your broad perspective brings innovative solutions. Ethical leadership inspires others.',
      health: 'Outdoor adventures and philosophical pursuits energize your spirit. Expand your physical horizons through new activities. Optimism heals at deep levels.',
      lucky: 'Thursday, Purple, Southeast direction',
      luckyNumber: 3,
      rating: 5,
    },
  },
  capricorn: {
    today: {
      overall: 'Saturn rewards your disciplined dedication with tangible progress. Authority and mastery define your interactions. Patient effort finally yields magnificent results.',
      love: 'Commitment deepens as trust is earned through consistent action. Your reliability is more romantic than words. Mature love grows richer with time.',
      career: 'Executive decisions and long-term planning align with cosmic timing. Your ambition guides you to well-deserved recognition. Status improves significantly.',
      health: 'Structural support through discipline and routine builds lasting vitality. Bone and joint health deserve careful attention. Rest is as important as effort.',
      lucky: 'Saturday, Black, South direction',
      luckyNumber: 8,
      rating: 4,
    },
  },
  aquarius: {
    today: {
      overall: 'Uranus sparks revolutionary ideas that change your world. Your humanitarian vision sees solutions others miss entirely. Innovation and originality define your day.',
      love: 'Unusual connections carry deep significance. Intellectual compatibility sparks romantic attraction. Friendship forms the foundation of lasting love.',
      career: 'Technology, social causes, and group efforts align with your highest purpose. Your progressive ideas gain unexpected support. Collective action creates change.',
      health: 'Electrical and nervous system vitality supports mental clarity. Eccentric health practices prove unexpectedly effective. Community wellness activities energize you.',
      lucky: 'Saturday, Electric Blue, Northwest direction',
      luckyNumber: 4,
      rating: 4,
    },
  },
  pisces: {
    today: {
      overall: 'Neptune dissolves boundaries as mystical awareness deepens. Your spiritual sensitivity perceives invisible currents of energy. Dreams carry prophetic wisdom tonight.',
      love: 'Soulmate energy permeates your romantic sphere. Unconditional love flows freely from your boundless heart. Spiritual bonds transcend ordinary understanding.',
      career: 'Creative and healing professions receive cosmic support. Your intuitive guidance proves invaluable to colleagues. Artistic projects channel divine inspiration.',
      health: 'Spiritual and emotional healing take precedence. Water therapies and sound healing restore harmony. Connect with the divine intelligence within you.',
      lucky: 'Thursday, Sea Green, North direction',
      luckyNumber: 7,
      rating: 5,
    },
  },
};

export const TAROT_CARDS = [
  { name: 'The Fool', number: 0, meaning: 'New beginnings, innocence, spontaneity, a free spirit', reversed: 'Naivety, foolishness, recklessness, risk-taking' },
  { name: 'The Magician', number: 1, meaning: 'Willpower, desire, creation, manifestation', reversed: 'Trickery, illusions, out of touch, manipulation' },
  { name: 'The High Priestess', number: 2, meaning: 'Intuition, Higher powers, mystery, subconscious mind', reversed: 'Hidden agendas, need to listen to inner voice' },
  { name: 'The Empress', number: 3, meaning: 'Feminine, beauty, nature, nurturing, abundance', reversed: 'Creative block, dependence on others' },
  { name: 'The Emperor', number: 4, meaning: 'Authority, father-figure, structure, solid foundation', reversed: 'Domination, excessive control, rigidity, stubbornness' },
  { name: 'The Hierophant', number: 5, meaning: 'Religion, group identification, conformity, tradition', reversed: 'Rebellion, subversiveness, new approaches' },
  { name: 'The Lovers', number: 6, meaning: 'Love, union, relationships, values alignment', reversed: 'Loss of balance, one-sidedness, disharmony' },
  { name: 'The Chariot', number: 7, meaning: 'Control, will power, victory, assertion, determination', reversed: 'Lack of control and direction, aggression' },
  { name: 'Strength', number: 8, meaning: 'Strength, courage, patience, control, compassion', reversed: 'Weakness, self-doubt, lack of self-discipline' },
  { name: 'The Hermit', number: 9, meaning: 'Soul searching, introspection, being alone, inner guidance', reversed: 'Isolation, loneliness, withdrawal' },
  { name: 'Wheel of Fortune', number: 10, meaning: 'Good luck, karma, life cycles, destiny, a turning point', reversed: 'Bad luck, resistance to change, breaking cycles' },
  { name: 'Justice', number: 11, meaning: 'Justice, fairness, truth, cause and effect, law', reversed: 'Unfairness, lack of accountability, dishonesty' },
  { name: 'The Star', number: 17, meaning: 'Hope, faith, rejuvenation, renewal, serenity', reversed: 'Lack of faith, despair, discouragement' },
  { name: 'The Moon', number: 18, meaning: 'Illusion, fear, the subconscious, intuition', reversed: 'Release of fear, repressed emotion, inner confusion' },
  { name: 'The Sun', number: 19, meaning: 'Positivity, fun, warmth, success, vitality', reversed: 'Negativity, depression, sadness' },
  { name: 'The World', number: 21, meaning: 'Completion, integration, accomplishment, travel', reversed: 'Incompletion, no closure, shortcuts' },
];

export const NUMEROLOGY_MEANINGS: Record<number, { title: string; description: string; traits: string[]; career: string; love: string }> = {
  1: {
    title: 'The Leader',
    description: 'You are a born leader with exceptional willpower and determination. Your independent nature drives innovation and pioneering achievements.',
    traits: ['Independent', 'Ambitious', 'Creative', 'Determined', 'Pioneering'],
    career: 'Entrepreneurship, management, politics, military leadership',
    love: 'You need a partner who respects your independence. You are loyal and protective in relationships.',
  },
  2: {
    title: 'The Diplomat',
    description: 'You possess extraordinary sensitivity and empathy. Your gift for partnership and diplomacy makes you a natural peacemaker and healer.',
    traits: ['Cooperative', 'Sensitive', 'Harmonious', 'Patient', 'Intuitive'],
    career: 'Counseling, diplomacy, healing arts, music, teaching',
    love: 'You flourish in committed partnerships. Your devotion and emotional depth create profound bonds.',
  },
  3: {
    title: 'The Communicator',
    description: 'Creativity and self-expression define your essence. Joy, optimism, and artistic talents radiate from your vibrant personality.',
    traits: ['Creative', 'Expressive', 'Joyful', 'Optimistic', 'Artistic'],
    career: 'Arts, entertainment, writing, public speaking, therapy',
    love: 'Romance fills your life with color and laughter. You bring joy and spontaneity to relationships.',
  },
  4: {
    title: 'The Builder',
    description: 'Your exceptional reliability and work ethic create lasting structures. You build solid foundations through discipline and practical wisdom.',
    traits: ['Reliable', 'Disciplined', 'Practical', 'Loyal', 'Hardworking'],
    career: 'Engineering, accounting, architecture, management, law',
    love: 'Steadfast loyalty and dedication define your romantic nature. You build relationships that last forever.',
  },
  5: {
    title: 'The Freedom Seeker',
    description: 'Adventure and freedom call to your restless spirit. Your adaptability and curiosity open doors to endless exciting experiences.',
    traits: ['Adventurous', 'Adaptable', 'Curious', 'Dynamic', 'Progressive'],
    career: 'Travel, sales, media, import/export, public relations',
    love: 'You need space and excitement in relationships. A partner who shares your love of adventure is ideal.',
  },
  6: {
    title: 'The Nurturer',
    description: 'Love, responsibility, and service to others define your highest purpose. Your compassionate heart creates beauty and harmony everywhere.',
    traits: ['Nurturing', 'Responsible', 'Compassionate', 'Idealistic', 'Harmonious'],
    career: 'Healthcare, education, counseling, interior design, social work',
    love: 'Family and partnership are your greatest treasures. You love deeply and unconditionally.',
  },
  7: {
    title: 'The Seeker',
    description: 'Wisdom, introspection, and spiritual depth mark your path. Your analytical mind and psychic awareness reveal hidden truths.',
    traits: ['Analytical', 'Introspective', 'Spiritual', 'Wise', 'Mysterious'],
    career: 'Research, academia, spirituality, technology, philosophy',
    love: 'Intellectual and spiritual connection is essential. You need depth, authenticity, and meaningful conversation.',
  },
  8: {
    title: 'The Powerhouse',
    description: 'Ambition, authority, and material mastery define your path. Your executive abilities and business acumen create remarkable abundance.',
    traits: ['Ambitious', 'Authoritative', 'Powerful', 'Business-minded', 'Resilient'],
    career: 'Business, finance, law, real estate, executive leadership',
    love: 'You need a partner who matches your drive and ambition. Power and respect form the foundation of your love.',
  },
  9: {
    title: 'The Humanitarian',
    description: 'Universal love and compassion flow through your generous spirit. You exist to serve humanity and inspire transformation.',
    traits: ['Compassionate', 'Generous', 'Humanitarian', 'Artistic', 'Idealistic'],
    career: 'Philanthropy, arts, healing, spirituality, environmental work',
    love: 'You love universally and deeply. You seek a partner who shares your vision of making the world more beautiful.',
  },
  11: {
    title: 'The Illuminator',
    description: 'You carry the master number of spiritual enlightenment. Your heightened intuition and visionary gifts inspire and illuminate others.',
    traits: ['Intuitive', 'Visionary', 'Inspiring', 'Idealistic', 'Psychic'],
    career: 'Spiritual leadership, psychology, writing, arts, healing',
    love: 'You seek a soulmate connection of deep spiritual resonance. Ordinary love is never enough for your transcendent heart.',
  },
  22: {
    title: 'The Master Builder',
    description: 'You possess the rarest and most powerful number. Your ability to manifest grand visions into practical reality is truly extraordinary.',
    traits: ['Visionary', 'Practical', 'Disciplined', 'Powerful', 'Transformative'],
    career: 'Global business, architecture, diplomacy, large-scale projects',
    love: 'Your partner must understand your grand mission. Love that supports your life purpose is most fulfilling.',
  },
  33: {
    title: 'The Master Teacher',
    description: 'The Christ consciousness number blesses you with extraordinary healing and teaching gifts. Your compassion uplifts all of humanity.',
    traits: ['Compassionate', 'Healing', 'Nurturing', 'Artistic', 'Self-sacrificing'],
    career: 'Spiritual teaching, healing arts, counseling, music, arts',
    love: 'Unconditional love defines your relationships. You inspire others to their highest expression of love.',
  },
};

export const PANCHANG_DATA = {
  tithi: 'Ekadashi (11th lunar day)',
  nakshatra: 'Rohini',
  yoga: 'Siddha',
  karana: 'Vishti',
  var: 'Mangalvaar (Tuesday)',
  rahukaal: '3:00 PM - 4:30 PM',
  sunrise: '6:14 AM',
  sunset: '6:47 PM',
  moonrise: '3:52 PM',
  moonset: '3:48 AM',
  auspicious: ['Abhijit Muhurta: 12:06 PM - 12:54 PM', 'Amrit Kaal: 9:42 AM - 11:12 AM'],
  inauspicious: ['Rahu Kaal: 3:00 PM - 4:30 PM', 'Yamaganda: 9:00 AM - 10:30 AM'],
};

export const HYPNOSIS_SESSIONS = [
  { id: 'confidence', title: 'Deep Confidence', duration: '15 min', category: 'Self-Mastery', description: 'Unlock limitless self-confidence through transformative hypnotic suggestion and deep subconscious programming.', color: '#C9A84C' },
  { id: 'sleep', title: 'Healing Sleep', duration: '25 min', category: 'Rest & Renewal', description: 'Enter the deepest, most rejuvenating sleep of your life with gentle hypnotic guidance.', color: '#7B2FBE' },
  { id: 'anxiety', title: 'Release Anxiety', duration: '20 min', category: 'Inner Peace', description: 'Dissolve stress and anxiety at their root through powerful hypnotic relaxation techniques.', color: '#00C9B1' },
  { id: 'abundance', title: 'Abundance Mindset', duration: '18 min', category: 'Prosperity', description: 'Reprogram your subconscious mind for wealth, success, and unlimited prosperity.', color: '#FF6B6B' },
  { id: 'healing', title: 'Deep Healing', duration: '30 min', category: 'Body & Soul', description: 'Activate your body\'s innate healing intelligence through the power of focused attention.', color: '#4CAF50' },
  { id: 'past_life', title: 'Past Life Journey', duration: '35 min', category: 'Soul Exploration', description: 'Journey safely through the corridors of time to discover the wisdom of your previous incarnations.', color: '#2196F3' },
];

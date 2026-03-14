export default function SubScreens() {
  return (
    <div className="relative w-screen h-screen overflow-hidden" style={{ background: "linear-gradient(160deg, #0D0520 0%, #1A0A3C 100%)" }}>
      <div className="absolute inset-0" style={{ background: "radial-gradient(circle at 80% 20%, rgba(0,201,177,0.1) 0%, transparent 40%)" }} />
      <div className="absolute top-[0] left-[0] right-[0] h-[1vh]" style={{ background: "linear-gradient(90deg, #C9A84C, #00C9B1, #7B2FBE)" }} />
      <div className="relative flex flex-col h-full px-[6vw] py-[4.5vh]">
        <div className="mb-[3vh]">
          <div className="text-[1.2vw] tracking-[0.2em] uppercase mb-[0.8vh]" style={{ color: "#C9A84C" }}>Navigated from tabs</div>
          <h2 className="font-display text-[3.2vw] font-bold" style={{ color: "#F5F0FF" }}>Sub-screens — Deep Dive Views</h2>
          <div className="mt-[0.8vh] h-[0.3vh] w-[6vw]" style={{ background: "#C9A84C" }} />
        </div>
        <div className="grid grid-cols-3 gap-[2vw] flex-1">
          <div className="rounded-2xl p-[2vw] flex flex-col gap-[1vh]" style={{ background: "rgba(123,47,190,0.2)", border: "1px solid rgba(123,47,190,0.4)" }}>
            <div className="flex items-center justify-between">
              <div className="text-[1.6vw] font-bold font-display" style={{ color: "#C9B1F5" }}>horoscope/[sign]</div>
              <div className="text-[1vw] px-[0.8vw] py-[0.3vh] rounded-full" style={{ background: "rgba(123,47,190,0.4)", color: "rgba(245,240,255,0.7)" }}>⭐ Horoscope tab</div>
            </div>
            <div className="text-[1.25vw] leading-relaxed" style={{ color: "rgba(245,240,255,0.7)" }}>Full zodiac sign reading. Dynamic route — receives sign name as param. Shows love, career, health, lucky numbers, compatible signs.</div>
          </div>
          <div className="rounded-2xl p-[2vw] flex flex-col gap-[1vh]" style={{ background: "rgba(0,201,177,0.12)", border: "1px solid rgba(0,201,177,0.3)" }}>
            <div className="flex items-center justify-between">
              <div className="text-[1.6vw] font-bold font-display" style={{ color: "#00C9B1" }}>kundali/</div>
              <div className="text-[1vw] px-[0.8vw] py-[0.3vh] rounded-full" style={{ background: "rgba(0,201,177,0.2)", color: "rgba(245,240,255,0.7)" }}>✨ Services tab</div>
            </div>
            <div className="text-[1.25vw] leading-relaxed" style={{ color: "rgba(245,240,255,0.7)" }}>Vedic birth chart. Shows planet positions in 12 houses as a grid. Includes Dasha periods table and planetary aspects summary.</div>
          </div>
          <div className="rounded-2xl p-[2vw] flex flex-col gap-[1vh]" style={{ background: "rgba(201,168,76,0.12)", border: "1px solid rgba(201,168,76,0.3)" }}>
            <div className="flex items-center justify-between">
              <div className="text-[1.6vw] font-bold font-display" style={{ color: "#F0C96A" }}>numerology/</div>
              <div className="text-[1vw] px-[0.8vw] py-[0.3vh] rounded-full" style={{ background: "rgba(201,168,76,0.2)", color: "rgba(245,240,255,0.7)" }}>✨ Services tab</div>
            </div>
            <div className="text-[1.25vw] leading-relaxed" style={{ color: "rgba(245,240,255,0.7)" }}>Life path number hero display. Core number breakdowns (expression, soul urge, personality). Trait tags and compatibility notes.</div>
          </div>
          <div className="rounded-2xl p-[2vw] flex flex-col gap-[1vh]" style={{ background: "rgba(245,240,255,0.07)", border: "1px solid rgba(245,240,255,0.18)" }}>
            <div className="flex items-center justify-between">
              <div className="text-[1.6vw] font-bold font-display" style={{ color: "#F5F0FF" }}>tarot/</div>
              <div className="text-[1vw] px-[0.8vw] py-[0.3vh] rounded-full" style={{ background: "rgba(245,240,255,0.1)", color: "rgba(245,240,255,0.7)" }}>✨ Services tab</div>
            </div>
            <div className="text-[1.25vw] leading-relaxed" style={{ color: "rgba(245,240,255,0.7)" }}>Interactive tarot card draw. Cards flip with 3D animation (rotateY). Supports single, three-card, and Celtic cross spreads.</div>
          </div>
          <div className="rounded-2xl p-[2vw] flex flex-col gap-[1vh]" style={{ background: "rgba(123,47,190,0.15)", border: "1px solid rgba(123,47,190,0.35)" }}>
            <div className="flex items-center justify-between">
              <div className="text-[1.6vw] font-bold font-display" style={{ color: "#C9B1F5" }}>panchang/</div>
              <div className="text-[1vw] px-[0.8vw] py-[0.3vh] rounded-full" style={{ background: "rgba(123,47,190,0.3)", color: "rgba(245,240,255,0.7)" }}>✨ Services tab</div>
            </div>
            <div className="text-[1.25vw] leading-relaxed" style={{ color: "rgba(245,240,255,0.7)" }}>Hindu calendar with mini monthly calendar. Shows Tithi, Nakshatra, Yoga, Karana, and auspicious Muhurta time slots for the day.</div>
          </div>
          <div className="rounded-2xl p-[2vw] flex flex-col gap-[1vh]" style={{ background: "rgba(0,201,177,0.12)", border: "1px solid rgba(0,201,177,0.3)" }}>
            <div className="flex items-center justify-between">
              <div className="text-[1.6vw] font-bold font-display" style={{ color: "#00C9B1" }}>meditation/</div>
              <div className="text-[1vw] px-[0.8vw] py-[0.3vh] rounded-full" style={{ background: "rgba(0,201,177,0.2)", color: "rgba(245,240,255,0.7)" }}>🌙 Hypnosis tab</div>
            </div>
            <div className="text-[1.25vw] leading-relaxed" style={{ color: "rgba(245,240,255,0.7)" }}>Guided meditation with animated countdown timer. Pulsing visual circle, session selector, and completion tracking with sound cues.</div>
          </div>
        </div>
        <div className="mt-[2vh] text-right text-[1.1vw]" style={{ color: "rgba(245,240,255,0.35)" }}>Slide 6 of 10</div>
      </div>
    </div>
  );
}

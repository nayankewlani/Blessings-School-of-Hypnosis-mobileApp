export default function TabScreens() {
  return (
    <div className="relative w-screen h-screen overflow-hidden" style={{ background: "linear-gradient(160deg, #0D0520 0%, #1A0A3C 100%)" }}>
      <div className="absolute inset-0" style={{ background: "radial-gradient(circle at 50% 90%, rgba(123,47,190,0.15) 0%, transparent 50%)" }} />
      <div className="absolute top-[0] left-[0] right-[0] h-[1vh]" style={{ background: "linear-gradient(90deg, #7B2FBE, #C9A84C, #00C9B1, #7B2FBE, #C9A84C)" }} />
      <div className="relative flex flex-col h-full px-[5vw] py-[4.5vh]">
        <div className="mb-[3.5vh]">
          <div className="text-[1.2vw] tracking-[0.2em] uppercase mb-[0.8vh]" style={{ color: "#C9A84C" }}>Bottom Tab Navigation</div>
          <h2 className="font-display text-[3.2vw] font-bold" style={{ color: "#F5F0FF" }}>The 5 Main Tab Screens</h2>
          <div className="mt-[0.8vh] h-[0.3vh] w-[6vw]" style={{ background: "#C9A84C" }} />
        </div>
        <div className="grid grid-cols-5 gap-[1.5vw] flex-1">
          <div className="rounded-2xl p-[1.8vw] flex flex-col gap-[1.2vh]" style={{ background: "rgba(245,240,255,0.06)", border: "1px solid rgba(245,240,255,0.15)" }}>
            <div className="text-[3.5vw]">🏠</div>
            <div className="text-[1.6vw] font-bold font-display" style={{ color: "#F0C96A" }}>Home</div>
            <div className="text-[1.1vw] font-mono" style={{ color: "rgba(245,240,255,0.45)" }}>index.tsx</div>
            <div className="mt-[1vh] flex flex-col gap-[0.8vh]">
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Hero banner with daily greeting</div>
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Quick access grid (6 services)</div>
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Panchang widget</div>
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Zodiac sign scroll strip</div>
            </div>
          </div>
          <div className="rounded-2xl p-[1.8vw] flex flex-col gap-[1.2vh]" style={{ background: "rgba(123,47,190,0.15)", border: "1px solid rgba(123,47,190,0.35)" }}>
            <div className="text-[3.5vw]">⭐</div>
            <div className="text-[1.6vw] font-bold font-display" style={{ color: "#C9B1F5" }}>Horoscope</div>
            <div className="text-[1.1vw] font-mono" style={{ color: "rgba(245,240,255,0.45)" }}>horoscope.tsx</div>
            <div className="mt-[1vh] flex flex-col gap-[0.8vh]">
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Period tabs: Daily / Weekly / Monthly</div>
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Zodiac sign selector grid</div>
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Love · Career · Health aspects</div>
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Navigates to [sign] detail</div>
            </div>
          </div>
          <div className="rounded-2xl p-[1.8vw] flex flex-col gap-[1.2vh]" style={{ background: "rgba(0,201,177,0.12)", border: "1px solid rgba(0,201,177,0.3)" }}>
            <div className="text-[3.5vw]">✨</div>
            <div className="text-[1.6vw] font-bold font-display" style={{ color: "#00C9B1" }}>Services</div>
            <div className="text-[1.1vw] font-mono" style={{ color: "rgba(245,240,255,0.45)" }}>services.tsx</div>
            <div className="mt-[1vh] flex flex-col gap-[0.8vh]">
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Navigation hub for all tools</div>
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Links to Kundali, Tarot</div>
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Links to Numerology, Panchang</div>
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Styled service card grid</div>
            </div>
          </div>
          <div className="rounded-2xl p-[1.8vw] flex flex-col gap-[1.2vh]" style={{ background: "rgba(201,168,76,0.12)", border: "1px solid rgba(201,168,76,0.3)" }}>
            <div className="text-[3.5vw]">🌙</div>
            <div className="text-[1.6vw] font-bold font-display" style={{ color: "#F0C96A" }}>Hypnosis</div>
            <div className="text-[1.1vw] font-mono" style={{ color: "rgba(245,240,255,0.45)" }}>hypnosis.tsx</div>
            <div className="mt-[1vh] flex flex-col gap-[0.8vh]">
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Breathing exercise animation</div>
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Session cards browser</div>
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Modal player with timer</div>
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Links to meditation screen</div>
            </div>
          </div>
          <div className="rounded-2xl p-[1.8vw] flex flex-col gap-[1.2vh]" style={{ background: "rgba(245,240,255,0.06)", border: "1px solid rgba(245,240,255,0.15)" }}>
            <div className="text-[3.5vw]">👤</div>
            <div className="text-[1.6vw] font-bold font-display" style={{ color: "#F5F0FF" }}>Profile</div>
            <div className="text-[1.1vw] font-mono" style={{ color: "rgba(245,240,255,0.45)" }}>profile.tsx</div>
            <div className="mt-[1vh] flex flex-col gap-[0.8vh]">
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Name, birth date, time, place</div>
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Auto-calculates zodiac sign</div>
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Life path number display</div>
              <div className="text-[1.15vw]" style={{ color: "rgba(245,240,255,0.7)" }}>· Saves to AsyncStorage</div>
            </div>
          </div>
        </div>
        <div className="mt-[2vh] text-right text-[1.1vw]" style={{ color: "rgba(245,240,255,0.35)" }}>Slide 5 of 10</div>
      </div>
    </div>
  );
}

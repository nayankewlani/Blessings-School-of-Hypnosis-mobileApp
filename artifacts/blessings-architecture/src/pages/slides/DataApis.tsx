export default function DataApis() {
  return (
    <div className="relative w-screen h-screen overflow-hidden" style={{ background: "linear-gradient(160deg, #0D0520 0%, #1A0A3C 100%)" }}>
      <div className="absolute inset-0" style={{ background: "radial-gradient(circle at 85% 85%, rgba(201,168,76,0.1) 0%, transparent 40%)" }} />
      <div className="absolute top-[0] left-[0] right-[0] h-[1vh]" style={{ background: "linear-gradient(90deg, #C9A84C, #7B2FBE, #00C9B1, #C9A84C)" }} />
      <div className="relative flex flex-col h-full px-[5.5vw] py-[4vh]">
        <div className="mb-[2.5vh]">
          <div className="text-[1.2vw] tracking-[0.2em] uppercase mb-[0.8vh]" style={{ color: "#C9A84C" }}>utils/astrology.ts</div>
          <h2 className="font-display text-[3.2vw] font-bold" style={{ color: "#F5F0FF" }}>Data & Utility APIs</h2>
          <div className="mt-[0.8vh] h-[0.3vh] w-[6vw]" style={{ background: "#C9A84C" }} />
          <p className="mt-[1.2vh] text-[1.35vw]" style={{ color: "rgba(245,240,255,0.6)" }}>All app data is local — no backend. Every screen reads from these pure functions in a single utility file.</p>
        </div>
        <div className="grid grid-cols-2 gap-[1.5vw] flex-1">
          <div className="flex flex-col gap-[1.2vw]">
            <div className="rounded-xl px-[1.8vw] py-[1.3vh]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="flex items-start justify-between gap-[1vw]">
                <div><div className="font-mono text-[1.25vw] font-semibold" style={{ color: "#F0C96A" }}>getZodiacSign(birthDate)</div><div className="text-[1.15vw] mt-[0.4vh]" style={{ color: "rgba(245,240,255,0.65)" }}>Returns zodiac sign name, symbol, element, ruling planet from any Date object</div></div>
                <div className="text-[0.95vw] px-[0.8vw] py-[0.3vh] rounded-full shrink-0" style={{ background: "rgba(123,47,190,0.3)", color: "#C9B1F5" }}>Profile</div>
              </div>
            </div>
            <div className="rounded-xl px-[1.8vw] py-[1.3vh]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="flex items-start justify-between gap-[1vw]">
                <div><div className="font-mono text-[1.25vw] font-semibold" style={{ color: "#F0C96A" }}>getHoroscope(sign, period)</div><div className="text-[1.15vw] mt-[0.4vh]" style={{ color: "rgba(245,240,255,0.65)" }}>Returns daily / weekly / monthly reading object with love, career, health, and lucky number fields</div></div>
                <div className="text-[0.95vw] px-[0.8vw] py-[0.3vh] rounded-full shrink-0" style={{ background: "rgba(123,47,190,0.3)", color: "#C9B1F5" }}>Horoscope</div>
              </div>
            </div>
            <div className="rounded-xl px-[1.8vw] py-[1.3vh]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="flex items-start justify-between gap-[1vw]">
                <div><div className="font-mono text-[1.25vw] font-semibold" style={{ color: "#F0C96A" }}>getTarotCard(index)</div><div className="text-[1.15vw] mt-[0.4vh]" style={{ color: "rgba(245,240,255,0.65)" }}>Returns card name, arcana type, upright meaning, reversed meaning, and keyword array from 78-card deck</div></div>
                <div className="text-[0.95vw] px-[0.8vw] py-[0.3vh] rounded-full shrink-0" style={{ background: "rgba(0,201,177,0.2)", color: "#00C9B1" }}>Tarot</div>
              </div>
            </div>
            <div className="rounded-xl px-[1.8vw] py-[1.3vh]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="flex items-start justify-between gap-[1vw]">
                <div><div className="font-mono text-[1.25vw] font-semibold" style={{ color: "#F0C96A" }}>getLifePathNumber(birthDate)</div><div className="text-[1.15vw] mt-[0.4vh]" style={{ color: "rgba(245,240,255,0.65)" }}>Calculates numerology life path number (1–9, 11, 22) by summing and reducing all birth date digits</div></div>
                <div className="text-[0.95vw] px-[0.8vw] py-[0.3vh] rounded-full shrink-0" style={{ background: "rgba(201,168,76,0.2)", color: "#F0C96A" }}>Numerology</div>
              </div>
            </div>
          </div>
          <div className="flex flex-col gap-[1.2vw]">
            <div className="rounded-xl px-[1.8vw] py-[1.3vh]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="flex items-start justify-between gap-[1vw]">
                <div><div className="font-mono text-[1.25vw] font-semibold" style={{ color: "#F0C96A" }}>getNumerologyMeaning(number)</div><div className="text-[1.15vw] mt-[0.4vh]" style={{ color: "rgba(245,240,255,0.65)" }}>Returns title, description, strengths, challenges, and compatibility list for a life path number</div></div>
                <div className="text-[0.95vw] px-[0.8vw] py-[0.3vh] rounded-full shrink-0" style={{ background: "rgba(201,168,76,0.2)", color: "#F0C96A" }}>Numerology</div>
              </div>
            </div>
            <div className="rounded-xl px-[1.8vw] py-[1.3vh]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="flex items-start justify-between gap-[1vw]">
                <div><div className="font-mono text-[1.25vw] font-semibold" style={{ color: "#F0C96A" }}>getPanchang(date)</div><div className="text-[1.15vw] mt-[0.4vh]" style={{ color: "rgba(245,240,255,0.65)" }}>Returns Tithi, Nakshatra, Yoga, Karana, and an array of Muhurta auspicious time windows for any given date</div></div>
                <div className="text-[0.95vw] px-[0.8vw] py-[0.3vh] rounded-full shrink-0" style={{ background: "rgba(123,47,190,0.3)", color: "#C9B1F5" }}>Panchang</div>
              </div>
            </div>
            <div className="rounded-xl px-[1.8vw] py-[1.3vh]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="flex items-start justify-between gap-[1vw]">
                <div><div className="font-mono text-[1.25vw] font-semibold" style={{ color: "#F0C96A" }}>getHypnosisSessions()</div><div className="text-[1.15vw] mt-[0.4vh]" style={{ color: "rgba(245,240,255,0.65)" }}>Returns array of session objects with id, title, duration, category, description, and breathing pattern config</div></div>
                <div className="text-[0.95vw] px-[0.8vw] py-[0.3vh] rounded-full shrink-0" style={{ background: "rgba(0,201,177,0.2)", color: "#00C9B1" }}>Hypnosis</div>
              </div>
            </div>
            <div className="rounded-xl px-[1.8vw] py-[1.3vh]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.12)" }}>
              <div className="flex items-start justify-between gap-[1vw]">
                <div><div className="font-mono text-[1.25vw] font-semibold" style={{ color: "#F0C96A" }}>getMeditationTrack(type)</div><div className="text-[1.15vw] mt-[0.4vh]" style={{ color: "rgba(245,240,255,0.65)" }}>Returns track metadata including name, duration in seconds, description, and breathing cycle timings for the timer screen</div></div>
                <div className="text-[0.95vw] px-[0.8vw] py-[0.3vh] rounded-full shrink-0" style={{ background: "rgba(0,201,177,0.2)", color: "#00C9B1" }}>Meditation</div>
              </div>
            </div>
          </div>
        </div>
        <div className="mt-[1.5vh] text-right text-[1.1vw]" style={{ color: "rgba(245,240,255,0.35)" }}>Slide 8 of 10</div>
      </div>
    </div>
  );
}

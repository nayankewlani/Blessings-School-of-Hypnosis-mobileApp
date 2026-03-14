export default function StateManagement() {
  return (
    <div className="relative w-screen h-screen overflow-hidden" style={{ background: "linear-gradient(160deg, #0D0520 0%, #1A0A3C 100%)" }}>
      <div className="absolute inset-0" style={{ background: "radial-gradient(circle at 50% 0%, rgba(123,47,190,0.2) 0%, transparent 45%)" }} />
      <div className="absolute top-[0] left-[0] right-[0] h-[1vh]" style={{ background: "linear-gradient(90deg, #7B2FBE, #00C9B1, #C9A84C)" }} />
      <div className="relative flex h-full px-[6vw] py-[5vh] gap-[4vw]">
        <div className="flex flex-col" style={{ minWidth: "35vw" }}>
          <div className="mb-[3vh]">
            <div className="text-[1.2vw] tracking-[0.2em] uppercase mb-[0.8vh]" style={{ color: "#C9A84C" }}>No backend required</div>
            <h2 className="font-display text-[3.2vw] font-bold leading-tight" style={{ color: "#F5F0FF" }}>State Management</h2>
            <div className="mt-[0.8vh] h-[0.3vh] w-[6vw]" style={{ background: "#C9A84C" }} />
          </div>
          <div className="rounded-2xl p-[2.2vw] mb-[2.5vh]" style={{ background: "rgba(123,47,190,0.2)", border: "1px solid rgba(123,47,190,0.4)" }}>
            <div className="text-[1.6vw] font-bold font-display mb-[1.2vh]" style={{ color: "#C9B1F5" }}>UserContext.tsx</div>
            <div className="text-[1.3vw] leading-relaxed" style={{ color: "rgba(245,240,255,0.75)" }}>React Context provider that wraps the entire app. Exposes user profile state to any screen without prop drilling. On mount, it reads saved data from AsyncStorage automatically.</div>
          </div>
          <div className="rounded-2xl p-[2.2vw]" style={{ background: "rgba(0,201,177,0.12)", border: "1px solid rgba(0,201,177,0.3)" }}>
            <div className="text-[1.6vw] font-bold font-display mb-[1.2vh]" style={{ color: "#00C9B1" }}>AsyncStorage</div>
            <div className="text-[1.3vw] leading-relaxed" style={{ color: "rgba(245,240,255,0.75)" }}>On-device key-value store. Persists user profile between app restarts. No account, no server, no internet required — fully offline.</div>
          </div>
        </div>
        <div className="flex flex-col flex-1 gap-[2vh]">
          <div className="text-[1.4vw] font-semibold" style={{ color: "rgba(245,240,255,0.6)" }}>What gets stored in AsyncStorage</div>
          <div className="flex flex-col gap-[1.4vh]">
            <div className="flex items-center gap-[2vw] rounded-xl px-[1.8vw] py-[1.2vh]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.1)" }}>
              <div className="font-mono text-[1.2vw]" style={{ color: "#F0C96A", minWidth: "16vw" }}>@user:name</div>
              <div className="text-[1.2vw]" style={{ color: "rgba(245,240,255,0.65)" }}>Display name shown in Home greeting</div>
            </div>
            <div className="flex items-center gap-[2vw] rounded-xl px-[1.8vw] py-[1.2vh]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.1)" }}>
              <div className="font-mono text-[1.2vw]" style={{ color: "#F0C96A", minWidth: "16vw" }}>@user:birthDate</div>
              <div className="text-[1.2vw]" style={{ color: "rgba(245,240,255,0.65)" }}>Used to calculate zodiac sign and life path number</div>
            </div>
            <div className="flex items-center gap-[2vw] rounded-xl px-[1.8vw] py-[1.2vh]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.1)" }}>
              <div className="font-mono text-[1.2vw]" style={{ color: "#F0C96A", minWidth: "16vw" }}>@user:birthTime</div>
              <div className="text-[1.2vw]" style={{ color: "rgba(245,240,255,0.65)" }}>Used for Kundali birth chart house placement accuracy</div>
            </div>
            <div className="flex items-center gap-[2vw] rounded-xl px-[1.8vw] py-[1.2vh]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.1)" }}>
              <div className="font-mono text-[1.2vw]" style={{ color: "#F0C96A", minWidth: "16vw" }}>@user:birthPlace</div>
              <div className="text-[1.2vw]" style={{ color: "rgba(245,240,255,0.65)" }}>Displayed on profile and birth chart screens</div>
            </div>
            <div className="flex items-center gap-[2vw] rounded-xl px-[1.8vw] py-[1.2vh]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.1)" }}>
              <div className="font-mono text-[1.2vw]" style={{ color: "#F0C96A", minWidth: "16vw" }}>@user:zodiacSign</div>
              <div className="text-[1.2vw]" style={{ color: "rgba(245,240,255,0.65)" }}>Auto-calculated from birth date, persisted for Home widget</div>
            </div>
            <div className="flex items-center gap-[2vw] rounded-xl px-[1.8vw] py-[1.2vh]" style={{ background: "rgba(245,240,255,0.05)", border: "1px solid rgba(245,240,255,0.1)" }}>
              <div className="font-mono text-[1.2vw]" style={{ color: "#F0C96A", minWidth: "16vw" }}>@user:numerologyNum</div>
              <div className="text-[1.2vw]" style={{ color: "rgba(245,240,255,0.65)" }}>Life path number displayed on profile and numerology screen</div>
            </div>
          </div>
          <div className="text-right text-[1.1vw] mt-auto" style={{ color: "rgba(245,240,255,0.35)" }}>Slide 9 of 10</div>
        </div>
      </div>
    </div>
  );
}

document.addEventListener("DOMContentLoaded", () => {
    const board = document.getElementById('wordle-board');
    const guessInput = document.getElementById('guess-input');
    const submitGuess = document.getElementById('submit-guess');
    const message = document.getElementById('message');

    const words = {
        "Alpas": "To be freed",
        "Alimpuyok": "Smell of something burning",
        "Balintataw": "Pupil of the eye",
        "Balisbis": "To drip slowly",
        "Dalumat": "Deep thought or insight",
        "Dungis": "Stain or blemish",
        "Duyog": "Eclipse",
        "Halaghag": "Restless or fidgety",
        "Himaton": "Clue or hint",
        "Huwad": "Fake or counterfeit",
        "Iral": "Resurgence or reappearance",
        "Kaluskos": "Rustling sound",
        "Kislap": "Sparkle or glint",
        "Kupas": "Faded",
        "Lantay": "Pure or unadulterated",
        "Lupig": "To be defeated",
        "Mabalasik": "Fierce or severe",
        "Magara": "Elegant or stylish",
        "Magayon": "Beautiful",
        "Mahapdi": "Stinging pain",
        "Makatao": "Humane",
        "Malambing": "Affectionate or gentle",
        "Malasakit": "Compassion or concern",
        "Maligamgam": "Lukewarm",
        "Maligaya": "Joyful or happy",
        "Mapanglaw": "Gloomy or desolate",
        "Mapanlikha": "Creative",
        "Masalimuot": "Complex or intricate",
        "Masigasig": "Enthusiastic",
        "Masukal": "Overgrown with weeds",
        "Matamlay": "Weak or lethargic",
        "Matalinhaga": "Enigmatic or mysterious",
        "Matiwasay": "Peaceful",
        "Matwid": "Upright or just",
        "Nabansot": "Stunted growth",
        "Naglalagablab": "Blazing or flaming",
        "Nakakakilabot": "Hair-raising or horrifying",
        "Nakakapangilabot": "Bloodcurdling",
        "Nalalabi": "Remaining or left over",
        "Namumutawi": "Uttered or spoken",
        "Natitirang": "Remaining",
        "Nilalambing": "Caressing or cuddling",
        "Pagsamo": "Plea or supplication",
        "Palamuting": "Decoration",
        "Palasyo": "Palace",
        "Pangarap": "Dream or aspiration",
        "Pangungulila": "Loneliness",
        "Panlumo": "Discouragement",
        "Paraluman": "Muse or inspiration",
        "Pasakit": "Suffering",
        "Pasya": "Decision",
        "Patagilid": "Sideways",
        "Patalim": "Sharp object or blade",
        "Piling": "Chosen or select",
        "Pinagtagpi-tagpi": "Patched up or pieced together",
        "Pinagbuklod": "United or bonded",
        "Pinaghuhugutan": "Source of strength",
        "Pinaglalaanan": "Allocated or designated",
        "Pinagmamaktol": "Grumbling or complaining",
        "Pinagpipitaganan": "Highly respected",
        "Pinagtutulungan": "Collaborated or worked on together",
        "Pinahihirapan": "Being tormented or troubled",
        "Pinakamakapal": "Thickest",
        "Pinakamakulay": "Most colorful",
        "Pinakamakulit": "Most persistent",
        "Pinakamasarap": "Most delicious",
        "Pinakamatamis": "Sweetest",
        "Pinakamatindi": "Most intense",
        "Pinakamayaman": "Wealthiest",
        "Pinakamura": "Cheapest",
        "Pinapanalangin": "Being prayed for",
        "Pinapatid": "Being stopped or hindered",
        "Pinaputukan": "Exploded or detonated",
        "Pinariwara": "Led astray or misguided",
        "Pinasok": "Entered or invaded",
        "Pinilit": "Forced or compelled",
        "Pintig": "Beat or pulse",
        "Pukyutan": "Honey bee",
        "Pusong-bato": "Heart of stone",
        "Pusong-mamon": "Soft-hearted",
        "Salansan": "Pile or stack",
        "Sambit": "Utterance or exclamation",
        "Sanlibutan": "World or universe",
        "Saysay": "Meaning or significance",
        "Sigla": "Vitality or energy",
        "Silakbo": "Outburst of emotion",
        "Silong": "Shelter or under the house",
        "Singkaw": "Halter or leash",
        "Siyasatin": "Examine or scrutinize",
        "Sugat": "Wound or injury",
        "Suliranin": "Problem or issue",
        "Sulyap": "Glance or peek",
        "Sumasalungat": "Opposing or contradicting",
        "Sumpa": "Curse or vow",
        "Taginting": "Resonance or ringing sound",
        "Takipsilim": "Twilight or dusk",
        "Talampas": "Plateau",
        "Talinhaga": "Allegory or metaphor",
        "Talumpati": "Speech or address",
        "Tanglaw": "Light or beacon"
        };

    const targetWord = Object.keys(words)[Math.floor(Math.random() * Object.keys(words).length)];
    const maxAttempts = 6;
    let currentAttempt = 0;

    // Set maxlength attribute to the length of the target word
    guessInput.setAttribute('maxlength', targetWord.length);
    guessInput.setAttribute('placeholder', `Enter your ${targetWord.length}-letter guess`);

    // Add event listener to filter input
    guessInput.addEventListener('input', (e) => {
        e.target.value = e.target.value.replace(/[^a-zA-Z]/g, '').slice(0, targetWord.length);
    });

    function createBoard() {
        for (let i = 0; i < maxAttempts; i++) {
            const row = document.createElement('div');
            row.classList.add('wordle-row');
            for (let j = 0; j < targetWord.length; j++) {
                const cell = document.createElement('div');
                cell.classList.add('wordle-cell');
                row.appendChild(cell);
            }
            board.appendChild(row);
        }
    }

    function checkGuess(guess) {
        const result = [];
        const targetWordArr = targetWord.toLowerCase().split('');

        // First pass for correct letters
        for (let i = 0; i < guess.length; i++) {
            if (guess[i] === targetWord.toLowerCase()[i]) {
                result.push('correct');
                targetWordArr[i] = null;  // Mark this letter as used
            } else {
                result.push(null);
            }
        }

        // Second pass for present letters
        for (let i = 0; i < guess.length; i++) {
            if (result[i] !== 'correct' && targetWordArr.includes(guess[i])) {
                result[i] = 'present';
                targetWordArr[targetWordArr.indexOf(guess[i])] = null;  // Mark this letter as used
            } else if (result[i] !== 'correct') {
                result[i] = 'absent';
            }
        }

        return result;
    }

    function updateBoard(guess, result) {
        const row = board.children[currentAttempt];
        for (let i = 0; i < guess.length; i++) {
            const cell = row.children[i];
            cell.textContent = guess[i];
            cell.classList.add(result[i]);
        }
    }

    function handleGuess() {
        const guess = guessInput.value.trim().toLowerCase();
        if (guess.length !== targetWord.length) {
            message.textContent = `Guess must be ${targetWord.length} letters long.`;
            return;
        }

        const result = checkGuess(guess);
        updateBoard(guess, result);
        currentAttempt++;

        if (guess === targetWord.toLowerCase()) {
            message.innerHTML = `Congratulations! You guessed the word! <br>Meaning: ${words[targetWord]}`;
            guessInput.disabled = true;
            submitGuess.disabled = true;
        } else if (currentAttempt >= maxAttempts) {
            message.innerHTML = `Game over! The word was: ${targetWord}. <br>Meaning: ${words[targetWord]}`;
            guessInput.disabled = true;
            submitGuess.disabled = true;
        } else {
            message.textContent = '';
        }

        guessInput.value = '';
    }

    createBoard();

    submitGuess.addEventListener('click', handleGuess);
    guessInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            handleGuess();
        }
    });
});
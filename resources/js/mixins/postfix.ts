const postfix = {
    methods: {
        determineGender(word: string): 'male' | 'female' | 'neutral' {
            const lastChar: string = word.charAt(word.length - 1)

            if (lastChar === 'а' || lastChar === 'я') {
                return 'female'
            } else if (lastChar === 'о' || lastChar === 'е') {
                return 'neutral'
            } else {
                return 'male'
            }
        },
        addCorrectEnding(amount: number, phrase: string): string {
            const cases: number[] = [2, 0, 1, 1, 1, 2]
            const maleEndings: string[] = ['', 'а', 'ов', 'а', 'а', 'ов']
            const femaleEndings: string[] = ['у', 'ы', '', 'а', 'а', '']
            const neutralEndings: string[] = ['о', 'а', '', 'а', 'а', '']

            const index: number = (amount % 100 > 4 && amount % 100 < 20) ? 2 : cases[Math.min(amount % 10, 5)]
            let firstWord: string = phrase.split(' ', 1).join()
            const withOutFirst: string = phrase.substring(firstWord.length).trim()

            const gender: 'male' | 'female' | 'neutral' = this.determineGender(firstWord)
            if (gender === 'female' || gender === 'neutral') firstWord = firstWord.slice(0, -1)

            const endings = {
                male: maleEndings,
                female: femaleEndings,
                neutral: neutralEndings
            }

            let ending: string = endings[gender][index];

            return `${firstWord}${ending} ${withOutFirst}`
        }
    }
}

export default postfix
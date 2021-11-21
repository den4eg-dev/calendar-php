export const switcher = () => {

    const lightStyles = document.querySelectorAll('link[rel=stylesheet][media*=prefers-color-scheme][media*=light]');
    const darkStyles = document.querySelectorAll('link[rel=stylesheet][media*=prefers-color-scheme][media*=dark]');
    const darkSchemeMedia = matchMedia('(prefers-color-scheme: dark)');
    const switcherRadios = document.querySelectorAll('.scheme-switcher__radio');



    const setupSwitcher = () => {
        const savedScheme = getSavedScheme()

        if (savedScheme !== null) {
            const currentRadio = document.querySelector(`.scheme-switcher__radio[value=${savedScheme}]`)
            currentRadio.checked = true
        }

        [...switcherRadios].forEach(radio => radio.addEventListener('change', e => {
                console.log('da')
            setScheme(e.target.value)
        })
        )

    }
    const setupScheme = () => {
        const savedScheme = getSavedScheme()
        const systemScheme = getSystemScheme()

        if(savedScheme === null) return

        if(savedScheme !==systemScheme) setScheme(savedScheme)
    }
    const setScheme = (scheme) => {
        switchMedia(scheme)

        scheme === 'auto' ? clearScheme() : saveScheme(scheme)
    }
    const switchMedia = (scheme) => {
        let lightMedia;
        let darkMedia;

        switch (scheme) {
            case 'auto':
                lightMedia = '(prefers-color-scheme: light)'
                darkMedia = '(prefers-color-scheme: dark)'
                break

            case 'light':
                lightMedia = 'all'
                darkMedia = 'not all'
                break

            case 'dark':
                lightMedia = 'not all'
                darkMedia = 'all'
                break

            default:
                lightMedia = '(prefers-color-scheme: light)'
                darkMedia = '(prefers-color-scheme: dark)'
                break;
        }

        [...lightStyles].forEach(link => link.media = lightMedia)

        ;[...darkStyles].forEach(link => link.media = darkMedia)
    }

    const getSystemScheme = () => {
        const darkScheme = darkSchemeMedia.matches
        return darkScheme ? 'dark' : 'light'
    }

    const getSavedScheme = () => {
        return localStorage.getItem('color-scheme')
    }
    const saveScheme = (scheme) => {
        localStorage.setItem('color-scheme', scheme)
    }
    const clearScheme = () => {
        localStorage.removeItem('color-scheme')
    }

    setupSwitcher()
    setupScheme()
}
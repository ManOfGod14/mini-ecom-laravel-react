export const SESSION_KEYS = {
    auth: '_authToken', // la clé qui va stocker les informations de connexion de l'utilisateur (dans le localStorage)
    app: '_appData' // la clé qui va stocker les données de l'application qui nous sera utile (dans le localStorage)
}

export const auth = JSON.parse(window.localStorage.getItem(SESSION_KEYS.auth));
export const app = JSON.parse(window.localStorage.getItem(SESSION_KEYS.app));

export const assignSessionAuth = async (authData) => {
   await window.localStorage.setItem(SESSION_KEYS.auth, JSON.stringify(authData))
}

export const assignSessionApp = async (appData) => {
    const new_app = {...app, appData}
    await window.localStorage.setItem(SESSION_KEYS.app, JSON.stringify(new_app))
}

export const logout = () => {
    for (const key in SESSION_KEYS) {
        window.localStorage.removeItem(SESSION_KEYS[key]);
    }
    window.location = '/auth/login';
}
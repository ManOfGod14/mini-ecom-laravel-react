export const SESSION_KEYS = {
    auth: '_udp',
    app: '_app'
}

export const auth = JSON.parse(window.localStorage.getItem(SESSION_KEYS.auth));
export const app = JSON.parse(window.localStorage.getItem(SESSION_KEYS.app));

export const assignSessionAuth = async (authData) => {
   await window.localStorage.setItem(SESSION_KEYS.auth,JSON.stringify(authData))
}

export const assignSessionApp = async (appData) => {
    const new_app = {...app, appData}
    await window.localStorage.setItem(SESSION_KEYS.app,JSON.stringify(new_app))
}

export const logout = () => {
    for (const key in SESSION_KEYS) {
        window.localStorage.removeItem(SESSION_KEYS[key]);
    }
    window.location = '/auth/login';
}
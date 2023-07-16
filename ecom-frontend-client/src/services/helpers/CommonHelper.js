/**
 * custom console log
 * @param {any} log
 * @returns
 */
export const customConsoleLog = (log) => {
    if (process.env.REACT_APP_SETUP === 'dev') {
        console.log('-----------------------------------------------')
        console.log(log)
        console.log('-----------------------------------------------')
    }
}

/**
 * get public folder absolute url
 * @param pathname
 * @returns
 */
export const getPublicAbsoluteUrl = (pathname) => {
    return process.env.PUBLIC_URL + pathname;
}

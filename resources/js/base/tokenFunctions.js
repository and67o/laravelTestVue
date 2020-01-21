import {
    TOKEN_NAME
} from "./constants";

export const getToken = () => {
    return window.localStorage.getItem(TOKEN_NAME)
};

export const setToken = token => {
    window.localStorage.setItem(TOKEN_NAME, token);
};

export const unsetToken = () => {
    window.localStorage.removeItem(TOKEN_NAME);
};

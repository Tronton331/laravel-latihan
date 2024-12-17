export default
{
    getCookie(name)
    {
        const Decoded = decodeURIComponent(document.cookie);
        const Array = Decoded.split("; ");
        let result = null;

        Array.forEach(element =>
        {
            if (element.indexOf(name) == 0)
            {
                result = element.substring(name.length + 1);
            }
        });
        return result;
    },
    setCookie(name, value, daysToLive)
    {
        const date = new Date();
        date.setDate(date.getDate() + daysToLive);
        let expires = "expires=" + date.toUTCString();
        document.cookie = `${name}=${value}; ${expires}; path=/`;
    },
    deleteCookie(name)
    {
        this.setCookie(name, null, null);
    }
}

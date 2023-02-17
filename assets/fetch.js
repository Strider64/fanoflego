class Fetch {

    async fetchData(path) {
        const res = await fetch(path)

        const {
            status
        } = res;

        if (status < 200 || status >= 300) {
            return console.log("Oh-Oh! Seite konnte nicht gefunden werden: " + status)
        }

        this.data = await res.text();
    }
}
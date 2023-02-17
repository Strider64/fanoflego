class fetchGameApi {
    constructor() {
    }
    static async getDBData() {
        return await fetch("fetchQuestions.php")
            .then(function (response) {
                return response.json();
            })
            .catch(error => console.log(error.message))
    };


    static postDBData(categoryURL, dataObject) {
        fetch(categoryURL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(dataObject)
        })
            .then(resp => resp.json())

    };


}


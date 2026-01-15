/*
Sukurti klasę Post.
Kuriant objektą iš šios klasės,
reikia įrašyti id savybę, pasirinktinai nuo 1 iki 100.
Objektas turi turėti visas savybes gautas iš 
serverio adresu: https://jsonplaceholder.typicode.com/posts/1 (objektas su id: 1).
*/

class Post {
    constructor(id) {
        this.id = id;
        this.loadData();
    }

    loadData() {
        fetch(`https://jsonplaceholder.typicode.com/posts/${this.id}`)
            .then(response => response.json())
            .then(data => {
                this.userId = data.userId;
                this.title = data.title;
                this.body = data.body;
            })
            .catch(error => console.error('Error fetching post data:', error));
            console.log(this);
    }
}

new Post(1);
new Post(47);
new Post(103); // neturėtų veikti

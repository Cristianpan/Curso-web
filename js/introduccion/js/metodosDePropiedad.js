// Metodos de propiedad y this

const reproductor = {
  songs: [],

  addSong: function (song) {
    this.songs = [...this.songs, song];
  },

  showSongs: function () {
    this.songs.forEach((song, index) => {
      console.log(`${index + 1}. ${song}`);
    });
  },

  addSongs: function (songs) {
    this.songs = [...this.songs, ...songs];
  },

  deleteSong: function (song) {
    this.songs = this.songs.filter((element) => element !== song); 
  }
};

reproductor.addSong("Solamente Tú");
reproductor.addSong("Viernes 13");
reproductor.addSongs(["Dance Mokay", "Life Goes On", "Understand"]);

reproductor.deleteSong("Solamente Tú"); 
reproductor.showSongs();

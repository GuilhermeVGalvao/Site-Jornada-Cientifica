var URL = "http://localhost/api";

var API = {

    login: (user, senha, callback) => {

        $.ajax({
            type: "POST",
            url: URL + "/login/access",
            data: JSON.stringify({
                user,
                senha
            }),
            dataType: "json",
            success: function success(data) {
                callback(data);
            },
            fail: function fail(erro) {
                console.log(erro);
            },
        });

    },

    new: (nome, email, sexo, callback) => {

        $.ajax({
            type: "POST",
            url: URL + "/inscritos/new",
            data: JSON.stringify({
                nome,
                email,
                sexo
            }),
            dataType: "json",
            success: function success(data) {
                callback(data);
            },
            fail: function fail(erro) {
                console.log(erro);
            },
        });

    },

    update: (id, nome, email, sexo, callback) => {

        $.ajax({
            type: "POST",
            url: URL + "/inscritos/update",
            data: JSON.stringify({
                id,
                nome,
                email,
                sexo,
                token: localStorage.getItem("token")
            }),
            dataType: "json",
            success: function success(data) {
                callback(data);
            },
            fail: function fail(erro) {
                console.log(erro);
            },
        });

    },

    list: (callback) => {

        $.ajax({
            type: "POST",
            url: URL + "/inscritos/list",
            data: JSON.stringify({
                token: localStorage.getItem("token")
            }),
            dataType: "json",
            success: function success(data) {
                callback(data);
            },
            fail: function fail(erro) {
                console.log(erro);
            },
        });

    },

    delete: (id, callback) => {

        $.ajax({
            type: "POST",
            url: URL + "/inscritos/delete",
            data: JSON.stringify({
                id,
                token: localStorage.getItem("token")
            }),
            dataType: "json",
            success: function success(data) {
                callback(data);
            },
            fail: function fail(erro) {
                console.log(erro);
            },
        });

    },

};
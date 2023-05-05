<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
    }

    body {
        /* this project is designed desktop only */
        min-width: 1500px;
    }

    header {
        position: fixed;
        top: 0px;
        height: 100px;
        background-color: black;
        width: 100%;
        z-index: 10;
        /* this project is designed desktop only */
        min-width: 1500px;
    }

    .header-flex {
        height: 100%;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1280px;
        margin-left: auto;
        margin-right: auto;
        font-size: 20px;
    }

    .header-flex__right {
        display: flex;
        gap: 30px;
    }

    .hero {
        background-color: #bd5734;
        padding-top: 35%;
        width: 100%;
        margin: auto;
        margin-top: 100px;
        position: relative;
    }

    .hero__text {
        color: white;
        position: absolute;
        width: 100%;
        top: 100px;
        left: 0px;
        text-align: center;
        font-size: 25px;
    }

    .btn {
        text-align: center;
        min-width: 150px;
        background-color: #000080;
        padding: 15px;
        border-radius: 30px;
        cursor: pointer;
    }

    .btn--logout {
        background-color: red;
    }

    .btn--basket {
        background-color: blue;
    }

    .btn--user {
        background-color: #4f3222;
    }

    .categories {
        max-width: 1280px;
        margin: auto;
        margin-top: 40px;
    }

    .categories__title {
        text-align: center;
        font-size: 30px;
        font-weight: 500;
        padding-bottom: 10px;
        border-bottom: 3px grey solid;
        margin-bottom: 40px;
    }

    .categories__items {
        display: flex;
        flex-wrap: wrap;
        gap: 30px 70px;
    }

    .categories__item {
        width: 200px;
        height: 200px;
        padding: 10px;
        background-color: #f0efef;
        color: black;
        display: flex;
        flex-direction: column;
        justify-content: end;
        align-items: center;
        border-radius: 20px;
        cursor: pointer;
        user-select: none;
    }

    .categories__item:hover {
        background-color: grey;
        color: black;
        transition: all;
        transition-duration: 200ms;
    }

    .bestseller {
        max-width: 1280px;
        margin: auto;
        margin-top: 40px;
    }

    .bestseller__title {
        text-align: center;
        font-size: 30px;
        font-weight: 500;
        padding-bottom: 10px;
        border-bottom: 3px grey solid;
        margin-bottom: 40px;
        padding-top: 40px;
    }

    .bestseller__items {
        display: flex;
        justify-content: space-between;
        padding-bottom: 40px;
    }

    .bestseller__item {
        width: 250px;
        height: 400px;
        color: black;
        background-color: white;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        border-radius: 20px;
        cursor: pointer;
        user-select: none;
        padding: 30px 0px 30px 0px;
        font-size: 20px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    .bestseller__item__image {
        width: 100%;
        height: 270px;
        background-color: white;
    }

    .bestseller__item:hover {
        background-color: grey;
        color: black;
        transition: all;
        transition-duration: 300ms;
    }

    .cards {
        padding-top: 70px;
        padding-bottom: 70px;
        max-width: 1280px;
        margin: auto;
        display: flex;
        justify-content: space-between;
    }

    .cards__card {
        width: 400px;
        height: 200px;
        background-color: #f0efef;
        text-align: center;
        padding: 20px;
        border-radius: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 30px;
    }

    footer {
        background-color: black;
        height: 100px;
    }

    footer div {
        color: white;
        text-align: center;
        padding-top: 40px;
    }
</style>
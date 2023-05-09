<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Verdana, Geneva, Tahoma, sans-serif
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
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;

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

    #logo {
        user-select: none;
        border-radius: 30px;
        cursor: pointer;
        background-color: #27272A;
        padding: 15px;
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

    #hero {
        width: 100%;
        margin-top: 100px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        height: auto;
        cursor: pointer;
    }

    .categories {
        max-width: 1280px;
        margin: auto;
        margin-top: 40px;
    }

    .categories__title {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        background-color: #f0efef;
        text-align: center;
        font-size: 25px;
        font-weight: 500;
        padding-bottom: 10px;
        margin-bottom: 40px;
        padding: 20px;
        user-select: none;
        cursor: pointer;
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
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        user-select: none;
        transition: all;
        transition-duration: 300ms;
    }

    .categories__item img {
        width: 150px;
        height: auto;
        border: 2px solid rgba(25, 25, 25, 0.1);
        margin-bottom: 15px;
        border-radius: 100%;
        padding: 0px;

    }

    .categories__item:hover {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        background-color: #F1F5F9;
        transition: all;
        transition-duration: 300ms;
        text-decoration: underline;
    }

    .bestseller {
        max-width: 1280px;
        margin: auto;
        margin-top: 40px;
        padding-top: 40px;
    }

    .bestseller__title {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        background-color: white;
        text-align: center;
        font-size: 25px;
        font-weight: 500;
        padding-bottom: 10px;
        margin-bottom: 40px;
        padding: 20px;
        user-select: none;
        cursor: pointer;
    }

    .bestseller__items {
        display: flex;
        justify-content: space-between;
        padding-bottom: 40px;
    }

    .bestseller__item {
        width: 250px;
        height: 375px;
        color: black;
        background-color: white;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: start;
        cursor: pointer;
        user-select: none;
        padding: 0px 0px 30px 0px;
        font-size: 20px;
        transition: all;
        transition-duration: 300ms;
    }

    .bestseller__item__image {
        width: 100%;
        height: 270px;
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center
    }

    .bestseller__item__image img {
        width: 250px;
        height: auto;
    }

    .bestseller__item:hover {
        background-color: #CBD5E1;
        transition: all;
        transition-duration: 300ms;
    }

    #product_name {
        padding-left: 20px;
    }

    .bestseller__item__price {
        color: red;
        font-weight: 600;
        font-family: Helvetica, sans-serif;
        padding-left: 20px;
    }

    .add_to_basket {
        cursor: pointer;
        user-select: none;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50px;
        background-color: #14532D;
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
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
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
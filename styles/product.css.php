<style>
    .main {
        margin: 250px auto 150px auto;
        max-width: 1280px;
        display: flex;
    }

    .main img {
        width: 500px;
        height: 500px;
        margin-right: 50px;
    }

    .main div {
        font-size: 30px;
    }


    .main-information {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    #price {
        color: red;
    }

    #add-to-basket {
        background-color: green;
        padding: 20px;
        width: min-content;
        border-radius: 30px;
        white-space: nowrap;
        font-size: 20px;
        color: white;
        cursor: pointer;
        user-select: none;
    }

    #add-to-basket:hover {
        background-color: darkgreen;
    }

    #description {
        font-size: 20px;
    }
</style>
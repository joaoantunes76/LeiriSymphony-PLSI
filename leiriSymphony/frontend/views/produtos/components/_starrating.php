<style>
    #star-1:checked ~ .starrating [for='star-1'] svg, #star-2:checked ~ .starrating [for='star-1'] svg, #star-2:checked ~ .starrating [for='star-2'] svg, #star-3:checked ~ .starrating [for='star-1'] svg, #star-3:checked ~ .starrating [for='star-2'] svg, #star-3:checked ~ .starrating [for='star-3'] svg, #star-4:checked ~ .starrating [for='star-1'] svg, #star-4:checked ~ .starrating [for='star-2'] svg, #star-4:checked ~ .starrating [for='star-3'] svg, #star-4:checked ~ .starrating [for='star-4'] svg, #star-5:checked ~ .starrating [for='star-1'] svg, #star-5:checked ~ .starrating [for='star-2'] svg, #star-5:checked ~ .starrating [for='star-3'] svg, #star-5:checked ~ .starrating [for='star-4'] svg, #star-5:checked ~ .starrating [for='star-5'] svg {
        transform: scale(1);
    }
    #star-1:checked ~ .starrating [for='star-1'] svg path, #star-2:checked ~ .starrating [for='star-1'] svg path, #star-2:checked ~ .starrating [for='star-2'] svg path, #star-3:checked ~ .starrating [for='star-1'] svg path, #star-3:checked ~ .starrating [for='star-2'] svg path, #star-3:checked ~ .starrating [for='star-3'] svg path, #star-4:checked ~ .starrating [for='star-1'] svg path, #star-4:checked ~ .starrating [for='star-2'] svg path, #star-4:checked ~ .starrating [for='star-3'] svg path, #star-4:checked ~ .starrating [for='star-4'] svg path, #star-5:checked ~ .starrating [for='star-1'] svg path, #star-5:checked ~ .starrating [for='star-2'] svg path, #star-5:checked ~ .starrating [for='star-3'] svg path, #star-5:checked ~ .starrating [for='star-4'] svg path, #star-5:checked ~ .starrating [for='star-5'] svg path {
        fill: #fb0;
        stroke: #cc9600;
    }

    .starrating {
        width: 145px;
        text-align: center;
    }
    .starrating label {
        display: inline-block;
        width: 50px;
        text-align: center;
        cursor: pointer;
    }
    .starrating label svg {
        width: 100%;
        height: auto;
        fill: white;
        stroke: #ccc;
        transform: scale(0.8);
        transition: transform 200ms ease-in-out;
    }
    .starrating label svg path {
        transition: fill 200ms ease-in-out, stroke 100ms ease-in-out;
    }
    .starrating label[for="star-null"] {
        display: block;
        margin: 0 auto;
        color: #999;
    }
</style>

<input type="radio" name="stars" class="d-none" value="0" id="star-null" />
<input type="radio" name="stars" class="d-none" value="1" id="star-1" />
<input type="radio" name="stars" class="d-none" value="2" id="star-2" />
<input type="radio" name="stars" class="d-none" value="3" id="star-3" />
<input type="radio" name="stars" class="d-none" value="4" id="star-4" checked />
<input type="radio" name="stars" class="d-none" value="5" id="star-5" />

<section class="starrating d-flex">
    <label for="star-1">
        <svg width="255" height="240" viewBox="0 0 51 48">
            <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
        </svg>
    </label>
    <label for="star-2">
        <svg width="255" height="240" viewBox="0 0 51 48">
            <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
        </svg>
    </label>
    <label for="star-3">
        <svg width="255" height="240" viewBox="0 0 51 48">
            <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
        </svg>
    </label>
    <label for="star-4">
        <svg width="255" height="240" viewBox="0 0 51 48">
            <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
        </svg>
    </label>
    <label for="star-5">
        <svg width="255" height="240" viewBox="0 0 51 48">
            <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
        </svg>
    </label>
    <label for="star-null" class="ml-2">
        Clear
    </label>
</section>

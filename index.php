<?php
/**
*
* Custom theme built by Jonathan Itzen
*
* @package Jonathan Itzen
* @subpackage Jonathan Itzen
* @since Jonathan Itzen 1.0
*/

get_header();
?>

<style>
    #temp-container {
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background-color: #333232;
        color: #1caab9;
        font-family: Proxima Nova;
    }
</style>

<div id="temp-container">
    <h1>Starter Theme</h1>
    <h3>By Jonathan Itzen</h3>
</div>

<?php wp_footer(); ?>
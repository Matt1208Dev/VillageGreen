$(document).ready(function()
{
    // NAVBAR

    // Modal1 "Espace client"

    $("#item-client").hover(function()
    {
        $("#item-client-submenu").addClass('d-flex').slideDown();
    });

    !$("#item-client").mouseleave(function()
    {
        $("#item-client-submenu").removeClass('d-flex');
    });

    !$("#item-client-submenu").mouseleave(function()
    {
        $("#item-client-submenu").removeClass('d-flex');
    });

    // Modal1 Navbar collapsed

    $("#item-client-nav-coll").hover(function()
    {
        $("#item-client-submenu-nav-coll").addClass('d-flex').slideDown();
    });

    !$("#item-client-nav-coll").mouseleave(function()
    {
        $("#item-client-submenu-nav-coll").removeClass('d-flex');
    });

    !$("#item-client-submenu-nav-coll").mouseleave(function()
    {
        $("#item-client-submenu-nav-coll").removeClass('d-flex');
    });

    // Modal2 "Espace client"
    $("#item-client").hover(function()
    {
        $("#item-client-submenu2").addClass('d-flex').slideDown();
    });

    !$("#item-client").mouseleave(function()
    {
        $("#item-client-submenu2").removeClass('d-flex');
    });

    !$("#item-client-submenu2").mouseleave(function()
    {
        $("#item-client-submenu2").removeClass('d-flex');
    });

    // Modal2 Navbar collapsed

    $("#item-client-nav-coll").hover(function()
    {
        $("#item-client-submenu2-nav-coll").addClass('d-flex').slideDown();
    });

    !$("#item-client-nav-coll").mouseleave(function()
    {
        $("#item-client-submenu2-nav-coll").removeClass('d-flex');
    });

    !$("#item-client-submenu2-nav-coll").mouseleave(function()
    {
        $("#item-client-submenu2-nav-coll").removeClass('d-flex');
    });

    // Dropdown Guitar/bass
    $("#item-guitar").click(function()
    {
        $("#item-guitar-submenu").slideDown();
    });

    !$("#nav-third-row-item-guitar").mouseleave(function()
    {
        $("#item-guitar-submenu").hide("50");
    });

    !$("#item-guitar-submenu").mouseleave(function()
    {
        $("#item-guitar-submenu").hide("50");
    });

    // Dropdown Drums
    $("#item-drums").click(function()
    {
        $("#item-drums-submenu").slideDown();
    });

    !$("#nav-third-row-item-drums").mouseleave(function()
    {
        $("#item-drums-submenu").hide("50");
    });

    !$("#item-drums-submenu").mouseleave(function()
    {
        $("#item-drums-submenu").hide("50");
    });

    // Dropdown Keyboard
    $("#item-keyboard").click(function()
    {
        $("#item-keyboard-submenu").slideDown();
    });

    !$("#nav-third-row-item-keyboard").mouseleave(function()
    {
        $("#item-keyboard-submenu").hide("50");
    });

    !$("#item-keyboard-submenu").mouseleave(function()
    {
        $("#item-keyboard-submenu").hide("50");
    });

    // Dropdown Studio
    $("#item-studio").click(function()
    {
        $("#item-studio-submenu").slideDown();
    });

    !$("#nav-third-row-item-studio").mouseleave(function()
    {
        $("#item-studio-submenu").hide("50");
    });

    !$("#item-studio-submenu").mouseleave(function()
    {
        $("#item-studio-submenu").hide("50");
    });

    // Dropdown Sono
    $("#item-sono").click(function()
    {
        $("#item-sono-submenu").slideDown();
    });

    !$("#nav-third-row-item-sono").mouseleave(function()
    {
        $("#item-sono-submenu").hide("50");
    });

    !$("#item-sono-submenu").mouseleave(function()
    {
        $("#item-sono-submenu").hide("50");
    });

    // Dropdown Lights
    $("#item-lights").click(function()
    {
        $("#item-lights-submenu").slideDown();
    });

    !$("#nav-third-row-item-lights").mouseleave(function()
    {
        $("#item-lights-submenu").hide("50");
    });

    !$("#item-lights-submenu").mouseleave(function()
    {
        $("#item-lights-submenu").hide("50");
    });

    // Dropdown DJ
    $("#item-dj").click(function()
    {
        $("#item-dj-submenu").slideDown();
    });

    !$("#nav-third-row-item-dj").mouseleave(function()
    {
        $("#item-dj-submenu").hide("50");
    });

    !$("#item-dj-submenu").mouseleave(function()
    {
        $("#item-dj-submenu").hide("50");
    });

    // Dropdown Cases
    $("#item-cases").click(function()
    {
        $("#item-cases-submenu").slideDown();
    });

    !$("#nav-third-row-item-cases").mouseleave(function()
    {
        $("#item-cases-submenu").hide("50");
    });

    !$("#item-cases-submenu").mouseleave(function()
    {
        $("#item-cases-submenu").hide("50");
    });

    // Dropdown Cases
    $("#item-accessories").click(function()
    {
        $("#item-accessories-submenu").slideDown();
    });

    !$("#nav-third-row-item-accessories").mouseleave(function()
    {
        $("#item-accessories-submenu").hide("50");
    });

    !$("#item-accessories-submenu").mouseleave(function()
    {
        $("#item-accessories-submenu").hide("50");
    });

    // FIN NAVBAR

});
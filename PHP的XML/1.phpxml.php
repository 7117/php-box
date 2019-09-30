<?php

//Initialize the XML parser
$parser=xml_parser_create();

//Function to use at the start of an element
function start($parser,$element_name,$element_attrs)
{
    switch($element_name)
    {
        case "NOTE":
            echo "-- Note --<br />";
            break;
        case "TO":
            echo "To: ";
            break;
        case "FROM":
            echo "From: ";
            break;
        case "HEADING":
            echo "Heading: ";
            break;
        case "BODY":
            echo "Message: ";
    }
}

function stop($parser,$element_name)
{
    echo "<br />";
}

function char($parser,$data)
{
    echo $data;
}

xml_set_element_handler($parser,"start","stop");

xml_set_character_data_handler($parser,"char");
$fp=fopen("test.xml","r+");

while ($data=fread($fp,4096))
{
    xml_parse($parser,$data,feof($fp)) or
    die (sprintf("XML Error: %s at line %d",
        xml_error_string(xml_get_error_code($parser)),
        xml_get_current_line_number($parser)));
}

xml_parser_free($parser);

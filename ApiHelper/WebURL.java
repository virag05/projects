package com.example.ashokshah.login.ApiHelper;

public class WebURL {
    public static final String IP_ADDRESS ="192.168.56.1";
    public static final String KEY_IMAGE_URL ="http://192.168.56.1/class1/";

    public static final String KEY_MAIN_URL =" http://" + IP_ADDRESS + "/class1/";
    public static final String KEY_SIGNUP_URL = KEY_MAIN_URL + "add-user.php";

    public static final String  KEY_LOGIN_URL = KEY_MAIN_URL+ "api-login.php";

    public static final String  KEY_BOOK_URL = KEY_MAIN_URL+ "api-add-booking.php";


    public static final String  CATEGORY_URL = KEY_MAIN_URL+"api-display-category.php";
    public static final String  KEY_VENUE_URL = KEY_MAIN_URL+"api-display-venue-master.php";

   // public static final String SUB_CATEGORY_URL = KEY_MAIN_URL+"api-display-sub-category.php";


}

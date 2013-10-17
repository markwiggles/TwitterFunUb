/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */






$(document).ready(function() {
    
   var data = 
        [{"text": {"S": "life is FANtastIC"},
                "id": {"N": "4"}, "profile_image_url": {"S": "http:\/\/a0.twimg.com\/profile_images\/378800000578890"},
                "sentiment": {"S": "positive"}, "created_at": {"N": "1381984344"},
                "twitter_id": {"N": "388878396089840006"},
                "screen_name": {"S": "annjrose"},
                "followers_count": {"N": "121"}},
            {"text": {"S": "life is NiCE"},
                "id": {"N": "3"},
                "profile_image_url": {"S": "http:\/\/a0.twimg.com\/profile_images\/378800000578890"}, "sentiment": {"S": "positive"}, "created_at": {"N": "1381984344"}, "twitter_id": {"N": "388878396089840006"}, "screen_name": {"S": "annjrose"}, "followers_count": {"N": "121"}}, {"text": {"S": "life is FuN"}, "id": {"N": "2"}, "profile_image_url": {"S": "http:\/\/a0.twimg.com\/profile_images\/378800000578890"}, "sentiment": {"S": "positive"}, "created_at": {"N": "1381984344"}, "twitter_id": {"N": "388878396089840006"}, "screen_name": {"S": "annjrose"}, "followers_count": {"N": "121"}}, {"text": {"S": "life is Great"}, "id": {"N": "1"}, "profile_image_url": {"S": "http:\/\/a0.twimg.com\/profile_images\/378800000578890"}, "sentiment": {"S": "positive"}, "created_at": {"N": "1381984344"}, "twitter_id": {"N": "388878396089840006"}, "screen_name": {"S": "annjrose"}, "followers_count": {"N": "121"}}, {"text": {"S": "life is good"}, "id": {"N": "0"}, "profile_image_url": {"S": "http:\/\/a0.twimg.com\/profile_images\/378800000578890"}, "sentiment": {"S": "positive"}, "created_at": {"N": "1381984344"}, "twitter_id": {"N": "388878396089840006"}, "screen_name": {"S": "annjrose"}, "followers_count": {"N": "121"}}, {"text": {"S": "life is HarD"}, "id": {"N": "9"}, "profile_image_url": {"S": "http:\/\/a0.twimg.com\/profile_images\/378800000578890"}, "sentiment": {"S": "positive"}, "created_at": {"N": "1381984344"}, "twitter_id": {"N": "388878396089840006"}, "screen_name": {"S": "annjrose"}, "followers_count": {"N": "121"}}, {"text": {"S": "life is TopS"}, "id": {"N": "8"}, "profile_image_url": {"S": "http:\/\/a0.twimg.com\/profile_images\/378800000578890"}, "sentiment": {"S": "positive"}, "created_at": {"N": "1381984344"}, "twitter_id": {"N": "388878396089840006"}, "screen_name": {"S": "annjrose"}, "followers_count": {"N": "121"}}, {"text": {"S": "life is TERRRRific"}, "id": {"N": "7"}, "profile_image_url": {"S": "http:\/\/a0.twimg.com\/profile_images\/378800000578890"}, "sentiment": {"S": "positive"}, "created_at": {"N": "1381984344"}, "twitter_id": {"N": "388878396089840006"}, "screen_name": {"S": "annjrose"}, "followers_count": {"N": "121"}}, {"text": {"S": "life is OBligatoRY"}, "id": {"N": "6"}, "profile_image_url": {"S": "http:\/\/a0.twimg.com\/profile_images\/378800000578890"}, "sentiment": {"S": "positive"}, "created_at": {"N": "1381984344"}, "twitter_id": {"N": "388878396089840006"}, "screen_name": {"S": "annjrose"}, "followers_count": {"N": "121"}}, {"text": {"S": "life is SiLLy"}, "id": {"N": "5"}, "profile_image_url": {"S": "http:\/\/a0.twimg.com\/profile_images\/378800000578890"}, "sentiment": {"S": "positive"}, "created_at": {"N": "1381984344"}, "twitter_id": {"N": "388878396089840006"}, "screen_name": {"S": "annjrose"}, "followers_count": {"N": "121"}}] 
    
    
    
   
    $('#tweets').empty();
    
    $('#tweets').append(data[0].text.S);


    
   
    
   
              $.each(data, function(count, item) {
                   
                 $('#tweets').append(data.text.S); 
                   
               });
   
    
    
    
});
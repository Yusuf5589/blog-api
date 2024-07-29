# 1. CategoryRep isimlendirmelere dikkat edilmeli.
# 2. data, getRep ?
 3. blogView, blogViewRep model event'ı ile arttırılmalı.
 4. try {
return  $this->data->getCategoryFirstRep($category);
} catch (\Throwable $th) {
return  response()->json([
"status"  =>"error",
"message"  =>$th->getMessage(),
]);
} bu kalıptan nasıl kurtulabilirsin?
# 5. MAIL env'si
# 6. CommentsJob -> NewCommentSendMail?
# 7. CommentsMail -> NewCommentMail?
# 8. protected $appends = ['image_url']; fonskiyonların arasında olmamalı
 9. img_url default img?
# 10. Privacy_Policy kvkk ayrı tablolar?
# 11. $blog =  Blog::where("status", true)->orderByDesc("view_count"); Cache::put("getblog", $blog->get(), 60*60); blog get cache put içinde yapılmasına gerek yok.
# 12. comments_gmail neden gmail?
 13. filamentte slug otomatik üretilmeli
# 14. The DatePicker::make("beginning_date")->label("Starter Date")->minDate(now()), starter Date field must be a date after or equal to 2024-07-26 10:41:50. post oluştururken bugün seçilirse.
 15. supervisord log dosyası commitlen'miş
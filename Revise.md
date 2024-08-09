# 1. CategoryRep isimlendirmelere dikkat edilmeli.
# 2. data, getRep ?
# 3. blogView, blogViewRep model event' ı ile artt ı r ı lmal ı .
# 4. try {
# return  $this->data->getCategoryFirstRep($category);
# } catch (\Throwable $th) {
# return  response()->json([
# "status"  =>"error",
# "message"  =>$th->getMessage(),
# ]);
} bu kal ı ptan nas ı l kurtulabilirsin?
# 5. MAIL env'si
# 6. CommentsJob -> NewCommentSendMail?
# 7. CommentsMail -> NewCommentMail?
# 8. protected $appends = ['image_url']; fonskiyonlar ı n aras ı nda olmamal ı
# 9. img_url default img?
# 10. Privacy_Policy kvkk ayr ı tablolar?
# 11. $blog =  Blog::where("status", true)->orderByDesc("view_count"); Cache::put("getblog", $blog->get(), 60*60); blog get cache put i ç inde yap ı lmas ı na gerek yok.
# 12. comments_gmail neden gmail?
# 13. filamentte slug otomatik ü retilmeli
# 14. The DatePicker::make("beginning_date")->label("Starter Date")->minDate(now()), starter Date field must be a date after or equal to 2024-07-26 10:41:50. post olu ş tururken bug ü n se ç ilirse.
# 15. supervisord log dosyas ı commitlen'mi ş (Sorun var olmuyor.)







# 1. view_count -> custom event ile 
# 2. CommentsRepository, CategoryRepository isimlendirme tekil ç o ğ ul?
# 3. getApiRepository isimlendirme?
# 4. $table->string('img_url')->default('img_url/blog-default.png'); yanl ış .
# 5. Resources t ü m s ü tunlar ı koymak zorunda d ğ eilsin ihtiyac ı n olanlar. CategoryResource & CategoryDetailResource
# 6. Policy::where('slug', $slug)->get()->first(); -> get() gerek yok.
# 7. Controller'daki fonksiyonlar?
# 8. contract_repositories nedir?
# 9. s ü tun isimlendirmesi? -> blogslug
# 10. BlogController i ç indesin zaten getBlogFirst gereksiz.





# 1. commentSend request validation?
# 2. event(new  EventsBlog($blog)); service'e konmal ı .
# 3. Controller'daki i ş lemlerini Service katman ı na ta şı mak.
# 4. ImageColumn::make('img_url')->defaultImageUrl(url('storage/img_url/blog-default.png'))
# 5. ->default('null') de ğ il null olmal ı .
# 6. errorResponse ve successResponse bi Responser Trait'i olu ş tur.
# 7. data tipleri null empty fark ı vs?
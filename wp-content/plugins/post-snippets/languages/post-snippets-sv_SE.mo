��    =        S   �      8  @   9  8   z  K   �  �   �  (   �     �       �        �  �   �  �   g     C	     S	     _	     g	     {	     �	  B   �	     �	  �   �	  �   y
     F     M  a   ]     �     �  �   �     �     �     �  
   �     �     �  D   �  $   '     L  	   U     _     g  �   �     :     V     v  �   �  �   I  2        ?  p   E     �     �     �     �  	   �    �  �     �   �  u   �  [   D     �  3   �  �  �  +   �  3   �  R   �  �   7  1   #     U  	   k  �   u     �  �       �     �     �     �     �  	          T   *       �   �  �   ,  	   "     ,  v   ?     �     �  �   �     �     �     �  
   �     �     �  V   �     8     U  	   d     n     v  �   �  #   ]   #   �      �   �   �   �   �!  <   c"     �"  t   �"     #     6#     I#     e#  	   q#    {#  �   �$    X%  b   a&  _   �&     $'  3   :'     7      5       2       #   0   &   )       4           1   '   *          +   <                  (          -   	            =   "   8       $         ,                ;                           /          %             :   .      3          9       !   6                                        
    (Use the help dropdown button above for additional information.) (string) (required) The name of the snippet to retrieve. (string) The variables to pass to the snippet, formatted as a query string. A comma separated list of custom variables you can reference in your snippet. A variable can also be assigned a default value that will be used in the insert window by using the equal sign, variable=default. A snippet named Untitled has been added. Add New Snippet Advanced An optional description for the Snippet. If filled out, the description will be displayed in the snippets insert window in the post editor. Basic Before the shortcode is outputted, it can optionally be formatted with %s, to transform quotes to smart quotes, apostrophes, dashes, ellipses, the trademark symbol, and the multiplication symbol. Build a library with snippets of HTML, PHP code or reoccurring text that you often use in your posts. Variables to replace parts of the snippet on insert can be used. The snippets can be inserted as-is or as shortcodes. Delete Selected Description Example Example PHP Snippet Export Export Snippets Export your snippets for backup or to import them on another site. For more information: Give the snippet a title that helps you identify it in the post editor. This also becomes the name of the shortcode if you enable that option If you enclose the shortcode in your posts, you can access the enclosed content by using the variable {content} in your snippet. The {content} variable is reserved, so don't use it in the variables field. Import Import Snippets Import snippets from a post-snippets-export.zip file. Importing overwrites any existing snippets. Import/Export Johan Steen Note the evaluation order, any snippet variables will be replaced before the snippet is evaluated as PHP code. Also note that a PHP snippet don't need to be wrapped in &lt;?php #code; ?&gt;. Options PHP PHP Code Parameters Post Snippets Post Snippets Documentation See the dedicated help section for information about PHP shortcodes. Selected snippets have been deleted. Settings Shortcode Snippet Snippets could not be imported: Snippets defined as shortcodes can optionally also be evaluated as PHP Code by enabling the PHP checkbox. PHP snippets is only available when treating the snippet as a shortcode. Snippets have been updated. Snippets successfully imported. Support Forums The name to use the shortcode is the same as the title of the snippet (spaces are not allowed). When inserting a shortcode snippet, the shortcode and not the content will be inserted in the post. This is the block of text, HTML or PHP to insert in the post or as a shortcode. If you have entered predefined variables you can reference them from the snippet by enclosing them in {} brackets. This snippet is insert only, no variables defined. Title To reference the variables in the example above, you would enter {url} and {name}. So if you enter this snippet: Unzipping failed. Update Snippets Upload failed. Usage Variables When enabling the shortcode checkbox, the snippet is no longer inserted directly but instead inserted as a shortcode. The obvious advantage of this is of course that you can insert a block of text or code in many places on the site, and update the content from one single place. When the shortcode is executed the loop_me variable will be replaced with the string supplied in the shortcode and then the PHP code will be evaluated. (Outputting the string five times in this case. Wow!) With a snippet defined like the one above, you can call it with its shortcode definition in a post. Let's pretend that the example snippet is named phpcode and have one variable defined loop_me, then it would be called like this from a post: You can retrieve a Post Snippet directly from PHP, in a theme for instance, by using the get_post_snippet() function. You will get the option to replace url and name on insert if they are defined as variables. http://johansteen.se/ http://wpstorm.net/wordpress-plugins/post-snippets/ Project-Id-Version: Post Snippets
Report-Msgid-Bugs-To: http://wordpress.org/tag/post-snippets
POT-Creation-Date: 2012-02-08 16:54:26+00:00
PO-Revision-Date: 2012-02-08 18:01+0100
Last-Translator: Johan Steen <artstorm@gmail.com>
Language-Team:  <artstorm@gmail.com>
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
X-Poedit-Language: Swedish
X-Poedit-Country: SWEDEN
 (Se hjälpmenyn ovan för mer information.) (sträng) (krävs) Namnet på snippeten att hämta. (sträng) Variablerna att skicka till snippeten, formatterat som en query sträng. En kommaseparerad lista av egna variabler som du kan använda i din snippet. En variabel kan också bli tilldelad ett förinställt värde som kommer användas i infogningsfönstret genom att använda lika-med-tecknet. variabel=värde. En ny snippet med namnet Untitled har lagts till. Lägg till ny snippet Avancerat En valfri beskrivning för snippeten. Om den är ifylld, så kommer den synas i Post Snippets infogningsfönster i inläggsredigeraren. Grundläggande Innan resultatet från shortcoden visas, kan den formatteras med %s, för att använda vackrare varianter av citationstecken, apostrofer, talstreck, ellipser, trademark och multiplicerings symboler. Skapa ett bibliotek av snippets med HTML, PHP kod eller återkommande text som du ofta använder i dina inlägg. Du kan använda fördefinerade variabler för att ersätta delar av ditt avsnitt vid infogning. Snippets kan infogas som text eller som shortcodes. Radera valda Beskrivning Exempel Exempel PHP Snippet Exportera Exportera snippets Exportera dina snippets för backup eller för att importera dem till en annan sajt. För mer information: Ge snippeten en titel som hjälper till att identifiera den i inläggsredigeraren. Titeln blir också namnet på shortcoden om du aktiverar det valet. Om du innesluter text med shortcoden i dina inlägg, så kan du komma åt det inneslutna innehålet genom att använda variabeln {content} i din snippet. {content} variablen är reserverad, så använd inte det namnet content i variabel fältet. Importera Importera snippets Importera snippets från en  post-snippets-export.zip fil. Importen skriver över eventuella snippets som redan finns. Importera/Exportera Johan Steen Notera evaluerings ordningen, variabler för snippet kommer ersättas innan snippeten evalueras som PHP kod. Notera också att en PHP snippet inte ska omslutas med &lt;?php #code; ?&gt;. Inställningar PHP PHP kod Parametrar Post Snippets Post Snippets Dokumentation Se hjälp sektionen som är dedikerad till PHP för information om denna inställning. Valda snippets har raderats. Inställningar Shortcode Snippet Snippets kunde inte importeras: Snippets som är definerade som shortcodes, kan om så önskas bli evaluerade som PHP kod genom att aktivera PHP kryssrutan. PHP snippets fungerar endast när snippet är aktiverad som en shortcode. Ändrade snippets  har uppdaterats. Importeringen av snippets lyckades. Supportforum Titeln på snippeten blir även namnet för att komma åt den som en shortcode (mellanslag är inte tillåtet). När man infogar en shortcode snippet, så blir shortcoden det som hamnar i inlägget och inte själva innehållet i snippeten. Detta är blocket med text, HTML eller PHP att infoga i inläggen eller som en shortcode. Om du har definerat variabler kan du referera dem från snippeten genom att skriva dem inom {} tecken. Denna snippet saknar variabler, så den infogas som den är. Titel För att referera variablerna i exemplet ovan, skulle du använda {url} och {name}. So om du skapar denna snippeten: Uppackningen misslyckades. Uppdatera snippets Uppladdningen misslyckades. Användning Variabler Genom att aktivera shortcode kryssrutan, så infogas inte längre snippeten rakt av utan sätts in som en shortcode. The uppenbara fördelen med detta är naturligtvis att du kan infoga ett block med text eller kod på många ställen på sajten, och uppdatera dem från ett ställe. När shortcoden körs kommer loop_me variabeln bli ersatt med strängen som definerad från shortcoden och efter det så evalueras PHP koden. (Skriver strängen 5 gånger i detta fallet. Wow!) Med en snippet definerad som den ovan, kan du komma åt den via dess shortcode namn i ett inlägg. Låt oss säga att exempel snippeten har fått namnet phpcode och att den har en variabel definerad loop_me, då skulle man komma åt den från ett inlägg så här: En snippet kan hämtas direkt via PHP, till exempel i ett tema, med get_post_snippet() funktionen. Du har möjligheten att ersätta url och name vid infogning om de är definerade som variabler. http://johansteen.se/ http://wpstorm.net/wordpress-plugins/post-snippets/ 
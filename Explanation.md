## Explanation

#### The problem to be solved
The problem to be solved in the crawler assessment is to build an app or plugin that allows an administrator to manually crawl their website's web pages (homepage specifically), extract internal hyperlinks, and display the results for SEO improvement purposes.
#### Technical specifications
I approached the problem by following the technical specifications.
- Create a back-end admin page where the admin can log in and trigger the crawl.
- Implement a crawl task that starts at the website's root URL (home page), extracts all internal hyperlinks, and stores the results temporarily in a MySQL database.
- Set a cron job that run the crawling process automatically every one hour.
- Implement the functionality to save the homepage.php as an HTML file and generate a sitemap.html file displaying the results as a sitemap list structure during crawling process.
- Display the crawled results on the admin page, allowing the admin to manually search for ways to improve SEO rankings.
- Handle errors and provide error notice messages to guide the admin on what to do in case of any issues.
#### The technical decisions
I chose to use PHP as the programming language, along with relevant libraries and frameworks such as Guzzle for HTTP requests and DOMDocument for XML generation. For data storage, I utilized a MySQL database to temporarily store the crawled results. I also implemented command design pattern for the crawl process because it provides a flexible and extensible solution that separates the request to crawl from the implementation details of the crawling logic. The command pattern allows encapsulating the crawl request as an object, which can be easily executed, scheduled, or queued for future processing. It also allows us to decouple the code responsible for triggering the crawl from the actual implementation, making it easier to modify or extend the crawling behavior without impacting the client code. Overall, the command design pattern enhances code organization, maintainability, and scalability, making it a suitable choice for the crawling process in this context.

####How the code itself works and why
The code itself consists of classes and methods that handle the crawling logic, storage, and presentation of the results. The crawl task would be triggered by the admin either manually or scheduled to run automatically every hour using cron jobs. The crawl logic would extract internal hyperlinks from the home page, store the results temporarily, save the home page as an HTML file, and generate the sitemap.html file with the crawled results in a sitemap structure.

####How the solution achieves the admin’s desired outcome per the user story
The solution achieves the desired outcome for the admin by providing a user-friendly admin page where they can initiate the crawl, view the results, and manually search for ways to improve SEO rankings. The extracted internal hyperlinks help identify the website's link structure, and the sitemap.html file provides a visual representation of the site's interconnected pages.

This solution allows the admin to have greater control over their website's SEO by providing insights into the internal linking structure and identifying areas for optimization. The manual crawling and analysis process empowers the admin to make informed decisions on SEO improvements based on the extracted data.

####How I approach a problem
I usually begin my approach to a challenge by comprehending the needs and wants of the user. I evaluate the problem statement, the user stories, and any specifications that were given. Moreover, I dissect the issue into its component parts and pinpoint the essential operations or tasks needed to resolve it. I take into account elements like usability, performance, maintainability, and scalability. I then decide on the best strategy to effectively and efficiently tackle the problem, plan the implementation, and make the necessary technical decisions.
####How I think about it
When thinking about a problem, I take a systematic and analytical approach. I consider the user's perspective and the desired outcome. I analyze the inputs, outputs, and any constraints or dependencies involved. I think about potential edge cases, error handling, and how to ensure the solution is robust and reliable. I also consider the available technologies, libraries, and frameworks that can aid in implementing the solution. Throughout the process, I aim to balance simplicity, efficiency, and maintainability to deliver a solution that meets the requirements.
####Why I chose this direction
I chose the direction of building a PHP app because it aligns with the requirements and user story of the assessment. PHP is a popular and widely supported language for web development, making it suitable for building web-related tools like crawlers. This direction allows for flexibility and scalability, as the solution can be extended and customized based on specific needs.
####Why this direction is a better solution
This direction is a better solution because it leverages PHP's capabilities for web development. PHP provides robust libraries and frameworks for tasks such as HTTP requests, DOM parsing, and database operations, which are essential for crawling web pages and extracting data. By utilizing established tools and technologies, it ensures compatibility, stability, and a rich feature set.
    


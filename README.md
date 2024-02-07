# Full Stack Candidate Challenge Project - Marketing Cube
## INTRODUCTION

Ringier South Africa serves as one of two tech hubs for Ringier's global operations. We build marketplace systems & Websites and fulfil a role to further the technical excellence for all of Ringier's many interests.

Our marketplace platforms are made up of Jobs, Property, and General Classified assets; uniquely localised and expertly scaled for markets on multiple continents.

This challenge project will give you a glimpse into life as a developer in the Marketing Cube at Ringier South Africa.

## WHAT ARE WE LOOKING FOR?

We're aiming to understand where you're at as a Full Stack Developer. To help, we provide a small Laravel project and a set of tasks for you. These tasks are to fix, modify, or add to this project and each task has a difficulty rating and will help us gauge your level of skill.

We expect that this should take between 2-5 hours to complete, with at least another hour per bonus task that you tackle. The fact that this is a sacrifice of time is not lost on us! It's no small ask, but we find it important for the following reasons:

1. To give you time to decide if this is a product space that you could get excited about.
1. For us to be able to honestly evaluate your competence, style and approach for the job at hand.
1. For you to be forced to play with some of our unique stack. Especially *Tailwind CSS*, which really needs to be experienced rather than explained.

We will rate the delivered work based on the expected position level as follows:

### Junior Level
* No issues setting up your local dev environment with PHP and an IDE or editor
* All junior level tasks should be completed
* Completed tasks should work as expected
* Tests should be created to cover new features or to prevent regressions
* Additions to this README should be included if required in the section covering project setup

### Middle Level
* All middle level and junior level tasks should be completed
* For front-end related tasks, Tailwind CSS should be used correctly to enable a responsive design and to style the UI into something decent
* Build with SEO in mind
* Code is written in an understandable and maintainable way
* Tests should be created to cover new features or to prevent regressions
* Additions to this README should be included if required in the section covering project setup

### Senior Level
* All senior level, middle level, and junior level tasks should be completed
* Completed front end tasks should clearly demonstrate competency with respect to the HTML and styling, as well as configuration that may be required. Please use Tailwind CSS for all styling
* Use Livewire and Javascript sparingly. In other words, if you can do something without using Livewire or Javascript, then do it that way
* The back end modifications and additions must be architected in an understandable and maintainable way using up to date framework techniques
* Tests should be created to cover new features or to prevent regressions
* Additions to this README should be included if required in the section covering project setup

**Please adhere to PSR-12 coding guidelines!**

## THE CHALLENGE

### Install the provided project:
1. Download this Git repo: https://github.com/RingierIMU/candidate-challenge-mkt-cube and extract it
1. Setup the newly downloaded project as a git repo and link it up to a new repo on Github
1. Copy `.env.example` to `.env`
1. Run `composer install`
1. Run `php artisan key:generate`
1. Run `php artisan migrate --seed` (answer 'Y' to creating the sqlite database)
1. Run `npm install`
1. Run `npm run build`

You can serve the project at this point by running `php artisan serve`

---
---

## TASKS

### JUNIOR LEVEL TASKS (5)

**Ticket: FSDC0001**

**Back End**

**Description:** Add pagination tests

Add a set of Feature tests to the existing `/tests/feature` folder.

Ensure the following is correct:
- On the first page of results, there is a link to page 2
- On the second page of results, there is a link to page 1, but that link must not include the parameter `page=1` (this test will fail)

You can use `$response = $this->visit(...)` and `$response->see(...)` to get such a test working.

---

**Ticket: FSDC0002**

**Back End & Blade**

**Description:** Add link prev and next to the head 

On the Postcards index page (also known as the search results page), in the head of the html, add `<link rel="prev" ...>` and `<link rel="next" ...>`. Use the paginated URLs as used by the pagination.

Do not render the `prev` link if on the first page. Also, do not render the `next` link if on the last page.

---

**Ticket: FSDC0003**

**Back End & Blade**

**Description:** Add structured markup Product schema to the listing detail page 

Using the Product schema as described in https://schema.org/Product add a `JSON-LD` block to the bottom of the HTML body in the product detail's blade. This block would look like this (example taking from one of our production Property listings):

```
<script type="application/ld+json">
  {
    "@context":"https://schema.org/",
    "@type":"Product",
    "name":"Serviced 3 Bed Apartment with En Suite in Nyali Area",
    "description":"PANAROMA RESIDENCE NYALI,Mombasa county.\n\nLocation - New Nyali",
    "offers":{
      "@type":"Offer",
      "url":"https://www.buyrentkenya.com/listings/3-bedroom-apartment-for-sale-nyali-area-3568290",
      "priceCurrency":"ZAR",
      "price":26500000,
      "priceValidUntil":"2023-11-28"
    }
  }
</script>
```

---

**Ticket: FSDC0004**

**Back End & Blade**

**Description:** Add a canonical tag to the HTML head for all pages

The canonical tag is missing from all pages. Please add it by simply rendering the current page's URL using `request()->fullUrl()`.
 
For reference, the canonical tag looks like: `<link rel="canonical" href="http://...">`

---

**Ticket: FSDC0005**

**Back End**

**Description:** Only display postcards on the search page (the postcard index) where is_draft is false

The postcards table has an `is_draft` column that reflects whether a postcard listing is a draft or can be considered online. This columns value is either a 1 to reflect that is is a draft or 0 to show that it is online.

Add this check to model's query in the `index` method in `app/Http/Controllers/PostcardController.php`.

---

### MIDDLE LEVEL TASKS (5)

**Ticket: FSDC0011**

**Back End**

**Description:** Remove unknown query parameters from canonical tag

Using `request()->fullUrl()` to render the canonical tag also renders out UTM parameters and other unexpected values (see FSDC0004). The canonical URL should be a clean URL without extra parameters. The only valid parameter to be included is `page`.

Using this knowledge, clean the URL to only include the `page` parameter if it exists, while removing all other parameters.

---

**Ticket: FSDC0012**

**Back End**

**Description:** Only display online postcards

Task FSDC0005 added an `is_draft` check, but a postcard also has an `online_at` and `offline_at` datetime. Add these columns as well to the check.

Also, display a 410 error page (not a 404 page) for the listing detail page if the listing is not online.

Add related tests to ensure online and offline postcards are displayed correctly.

---

**Ticket: FSDC0013**

**Back End**

**Description:** Modify the pagination link to page 1 

Links to page 1 used in the pagination and link prev and next tags should never include `page=1` as a parameter. The expected approach to handling this is to implement a custom length aware paginator that will provide a custom URL if the previous link is to page 1.

Ensure the tests created for pagination now pass and are not affected by the canonical and `prev` links.

---

**Ticket: FSDC0014**

**Front End & Back End**

**Description:** Add some placeholder images for postcards

Make use of https://picsum.photos to add images to each postcard. Use the following URL to get a unique image for each postcard every time the search page loads: `https://picsum.photos/400/200?random={postcard id}`.

Update the blade template to display the images nicely for the search page and the postcard detail page. Be sure to use Tailwind.

---

**Ticket: FSDC0015**

**Front End & Back End**

**Description:** Add simple search

Add a text input to the search page that will allow a user to enter a string. When the user clicks the `Search` button next to this input field, the page will reload with the postcards that match the entered search text. The entered search text should be matched against part or all of the postcard's title.

Add tests for this new feature.

---
### SENIOR LEVEL TASKS (3)

**Ticket: FSDC0101**

**Back End & Blade**

**Description:** Add sitemap

Add a single sitemap file that has all online postcards. Include the postcard's canonical URL and the `lastmod` for the postcard. The sitemap's path should be `/sitemap.xml`.

The sitemap should not be dynamic. A scheduled task should generate the sitemap every hour from 7am to 8pm every day. And this generated sitemap should be served when requested.

Ensure that the `Sitemap: http://...` entry is included last in the `robots.txt` file.

---

**Ticket: FSDC0102**

**Front End & Back End**

**Description:** Allow postcards to be soft deleted 

Make any changes necessary to soft delete postcards. A user trying to view a soft deleted postcard should be redirected to the homepage with a 301 redirect. Ideally, a simple notification should display that the postcard is no longer available

Add tests to ensure a soft deleted postcard does a 301 redirect.

---

**Ticket: FSDC0103**

**Front End & Back End**

**Description:** Add a simple postcard management dashboard 

There already exists paths for `/login`, `/register`, and `/dashboard`. Modify the placeholder dashboard to allow a user to add new postcards, edit postcards, and delete postcards.

Add useful tests. Also, deny access to `/register` and `/dashboard` for all crawlers in the `robots.txt`

---
---

## PLEASE FOLLOW THESE GIT PRACTICES:
1. Create a feature branch for each task and name the branch with the following pattern: "Ticket ID-Short-Description". So the first ticket's branch would be "FSDC0001-add-pagination-tests"
1. Commit often, with meaningful commits
1. Create a Pull Request on Github to merge your feature branch into your Main branch on your fork
1. Squash & Merge your feature branch directly into the main branch. But only merge when you have tested your ticket's work. If fixes are required after merging, do them as new branches with "Fix" as part of the name
1. Don't delete the branches as we will be reviewing the commit history in them

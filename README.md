# Mailchimp API 

## Requirements
Create a new Mailchimp account (free account). Using Mailchimp's RESTful API:
- create a new list
- add your email to the list
- add a few other valid emails
- send out a campaign from Mailchimp to everyone in the list

**Assumptions:** 
- Newly created Mailchimp account have a default audience list and a contact.
- Free account only allows for 1 audience list
=> Had to delete the default list manually before I did the tasks

## Idea
- Create php forms to input data
- On submit of these forms, make API requests to collect the input data and perform the tasks
- The code to call the API will be presented as a function to reuse for different forms

## Files documentation
### global.php
- Include the `callAPI` function with parameters ($method, $url, $data, $apiKey) for requests with different methods and data
- Include the `checkAudience` function to check if there exists a list of contacts. If not => Signal users to create a list before they start. If yes => return the Audience ID 
- Include the `checkCampaign` function to show ID and create_time of all available campaigns of the list

### Other files
- index: You can add new contact to existing audience list, create a new list or create a campaign
- list: Create new list here
- campaign: Create new campaign. After that, redirect to content.php to add content for the campaign
- send: send the campaign by entering its ID

## Note:
Remember to insert your API key in the global.php file

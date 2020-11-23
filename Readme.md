## Description
Contactless Donation & Tax Receipt Tracker plugin allows organizations to aceept donations and dispatch receipt efficiently in the 
pandemic situation by provideng donation tracking and approving flow (system) to bith donors and nonprofit members to communicate 
and accomplish the good deeds.
Contactless Donation & Tax Receipt Tracker plugin will give configurable and pluggable features to place the required components of 
the flow in various place of the system which is already do exist at the nonprofit side.

### Main Features
1. User can create donation requests from system. Each request will be assigned an Unique TAG. 
2. Nonprofit can validate and approve the donations from the Plugin Backend.
3. The PDF Receipts can be downloded directly by user from their donation requests after the nonprofit accepts/approves the donatoin.
4. Nonprofit are allowed to update the donation request contents and updated the receipt as needed.
5. The entire Contactless chain is available from accepting the donation to dispatching the Tax Receipts. 

### Pluggable Features:
6. The underlying user management system of WordPress will be used. No additional setup is required.
7. Shortcode `[list-user-donations]` is available to populate the history of donations the user has made - This can be placed anywhere in the system.

### Configurable Options
8. This plugin can be made avilable on demand as the nonprofit required - The easy to install/uninstall instruction is available below.
9. Donation receipt will be generated via a HTML Template, Which can be effortlessly be updated from the WordPress/Plugin backend.
10. Receipt PDFs are generated on-demand, Thus there is no space constraints in the server. Temporary data will be wiped as used. 

### Installation
This section describes how to install the plugin and get it working.
1. Upload and Unzip `dfss-ohack.zip` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Update plugin options from WordPress Backend - Settings and Receipt Template.
4. To uninstall this feature - uninstall the plugin from WordPress backend.

### Frequently Asked Questions
#### How to update the receipt template?
Receipt template can be updated via plugin options which is available at "UDR Options" screen in WordPress backend. 
Recept template is a HTML template with following Data variables: 
{{donor}}, {{tag}}, {{email}}, {{phone}}, {{street}}, {{city}}, {{state}}, {{zip}}, {{suits}}, {{separates}}, {{shoes}}, {{other}}

#### How to identify donations and respective receipts which is raised within system?
Donations can be identified with unique TAG value assigned to them. List of donations are available at WordPress backend. 

#### How to validate and approve the donations? 
Donation data can be updated via `Receipts` menu which is available at WordPress backend. After validating the donation goods - respective count should be updated and marked as approved.

#### When the donors can download the receipt? =
Receipts will be available immediatley after the approval of staff and can be downloaded from Users account section. Receipts will be approved after filling the donation form and dropping the donations physically at NPO's place.

### Screenshots 
* `screenshots/donation-form.png` - The pre designed donation form with required fields to generate the Tax receipt.
* `screenshots/donation-list.png` - Front end donation list (user specific) generated via the shortcode `[list-user-donations]`.
* `screenshots/donation-list-backend.png` - Backend donation list to be used to look up by the TAG.
* `screenshots/donation-approval.png` - Backend form to update and approve the donation.
* `screenshots/plugin-receipt-template.png` - HTML Template of receipt with Data variables. This will be used to generate the Tax receipt for user.

### Impact 
Having an online tax receipt will enable donors to drop off faster and increase our community support. Staff time will be utilized more efficiently and directed towards helping more clients. 
>> Our solution covers 100% of the impact and provides more with Tracking and Approval process. <<

Useul Links:
https://www.ohack.org/hackathon/non-profits#h.65jtncwhacyq
https://github.com/2020-opportunity-hack/Team-13
https://www.ohack.org/
https://sanjose.dressforsuccess.org/

<b>Dress for Success San Jose</b><br/>
<i>Problem Statement</i><br/>
The mission of 'Dress for Success San Jose' is to empower women to achieve economic independence by providing a network of support, professional attire, and development tools to help women thrive in work and life. 
<br/><br/>
Scenario<br/>
I am Jane, a professional woman who likes to buy nice clothes, shoes, and accessories. I am now retired and looking to donate my work wardrobe to Dress for Success San Jose. The clothes will help women in need of professional attire. After I have donated, completing the tax receipt is time-consuming, outdated, and cumbersome. I also want to donate money in addition to my clothes, but the whole process takes 15 minutes. This makes me hesitant and resistant to donate clothing and money. I am trying to improve the lives of women that are served by Dress for Success San Jose.
<br/><br/>
How might we make it easy for Jane to pre-complete the tax receipt and add her monetary donation on her own before dropping off her donations?
<br/><br/>
How might we see and recognize donors at the time of donation? 
<br/><br/>
Impact<br/>
Having an online tax receipt will enable donors to drop off faster and increase our community support. Staff time will be utilized more efficiently and directed towards helping more clients. 

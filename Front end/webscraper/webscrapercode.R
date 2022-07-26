#setting working directory to ensure files save in the correct place
setwd(dirname(rstudioapi::getSourceEditorContext()$path))
#Loading relevant Packages, incl. Web Scraper
#Web scraper package
library(rvest)
#included in tidyverse allows piping results, making longer commands easier to write
library(dplyr)
#contains multiple packages that improve R capabilities
library(tidyverse)



#Defining the url for the scraper to analyse
site <- ("https://scam-numbers.co.uk/")
webpage <- read_html(site)
# phone numbers needs to be grabbed once every seven days.
number <- webpage %>% html_elements("#first-section h3") %>% html_text()

threat_Level <- webpage %>% html_elements(".comment_status") %>% html_text()

## Combining the scraped information into a dataframe and adding a column for comments and origin of record
number_Record <- data.frame(number,threat_Level)
complete_number_rec <- number_Record %>%  add_column(Number_comment = NA) %>% add_column(Record_Origin ="Scraped")
complete_number_rec <- complete_number_rec %>% dplyr::rename(Phone_Number=number, Threat_Level = threat_Level)

## Removing any entries that are not 11 digits long
clean_complete_number_rec <- complete_number_rec[(which(nchar(complete_number_rec$Phone_Number) == 11)),]
## number list with erroneous numbers filtered out.

#Making a weekly csv file containing the dataframe, for record keeping
write.csv(clean_complete_number_rec, "C:\\Users\\L'shon.smith\\Documents\\Uni Work\\2nd Sem\\Finaly Year Project\\Web Scraper\\weekly_numbers.csv")


#For adding scraped data to a database
library(RMySQL)

#Configuring Connection settings

c3539582 <- dbConnect(MySQL(),user="root",db="final_year_project",host="localhost")

dbWriteTable(c3539582, name='number_record', value=clean_complete_number_rec, append=T)

## For sending email updates about scraped data
library(sendmailR)

from <- "<lshonsmith1@gmail.com>"
to <- "<lshonsmith1@gmail.com>"
subject <- "Weekly Summary of Reported Phone Scams"
body <- "Attached is the weekly updated number report"
attachment <- mime_part(x="C:\\Users\\L'shon.smith\\Documents\\Uni Work\\2nd Sem\\Finaly Year Project\\Web Scraper\\weekly_numbers.csv",name="Weekly_Numbers.csv")
body_with_attachment <- list(body, attachment)
#attachment code found here: https://stackoverflow.com/questions/64127779/send-email-from-r-using-sendmailr-with-more-than-1-attachments

mailserver <- list(smtpServer="aspmx.l.google.com", smtpPort="25")

sendmail(from = from, to = to, subject = subject, msg = body_with_attachment, control = mailserver,)


# Brainstorm Kian Acquoij

## Important
- Database must be secure
- Panel for lab worker
- Panel for GP
- (Optional) Side for patients


## Start to finish
- To register a new user, the GP has to login to a panel
- Inside the panel, the GP has to enter basic information about the patient (such as name, age, sex, etc.), the patient will now also have a unique patient ID
- Now that the patient is registered, a code will be generated that will be needed for the shipping of the test capsules and are now ready for shipment
- (Just an idea) When the capsules arrive at the lab, the 'progress' value will change so the GP could see the stage
- The capsules are now ready to be inserted
- When the tests are done, a lab worker will upload the excel file (the backend will read the excel and import the values to the database)
- The GP will get an alert message that tells the result is ready to be looked at
- The GP will login to the panel, insert the patient's ID and can now look at a clear result of the test (Low/medium/high risk score)

## Safety
- To login to the system the GP has to verify their login, an example for this is receiving a text messages with a verification code.
- Could implement a feature that also checks the ip address of the user, if the ip address is not in a list of allowed ip's, the user can not login.

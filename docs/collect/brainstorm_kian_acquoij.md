# Ideas
### **Panel for GP**

#### Inside the panel the GP can add and manage patients.

#### Advantages: Easy for the GP to add patients, a clean overview

#### Disadvantages: Security is very important here.

---

### **Security**

#### Security is a very imporant thing, all data has to be saved in a secure place.
#### The login should also be very secure, think about a verification code for the GP to login, or even allow access from only a couple IP addresses.

#### Adventages: This way no data will be stealed.

#### Disadvantages: Costs extra time to make everything more secure.

---

### **Test result**

#### It is important that the GP gets a clean overview of the test result. The values low/medium/high will show the risk level. Next to that there will also be a overview of the full results.

#### Advantages: This way the GP doesn't have to spend much time to see the result.

<br>

# Start to finish
- To register a new user, the GP has to login to a panel
- Inside the panel, the GP has to enter basic information about the patient (such as name, age, sex, etc.), the patient will now also have a unique patient ID
- Now that the patient is registered, a code will be generated that will be needed for the shipping of the test capsules and are now ready for shipment
- (Just an idea) When the capsules arrive at the lab, the 'progress' value will change so the GP could see the stage
- The capsules are now ready to be inserted
- When the tests are done, a lab worker will upload the excel file (the backend will read the excel and import the values to the database)
- The GP will get an alert message that tells the result is ready to be looked at
- The GP will login to the panel, insert the patient's ID and can now look at a clear result of the test (Low/medium/high risk score)

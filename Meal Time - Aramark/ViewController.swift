//
//  ViewController.swift
//  Meal Time - Aramark
//
//  Created by PREET PATEL on 3/2/20.
//  Copyright © 2020 aramark. All rights reserved.
//

import UIKit
import HealthKit

let healthStore:HKHealthStore = HKHealthStore()

class ViewController: UIViewController {
    
    
    @IBOutlet weak var ageage: UITextField!
    @IBOutlet weak var bgroup: UITextView!
    @IBOutlet weak var wupdate: UITextField!
    @IBOutlet weak var ProteinUpdate: UITextField!

    
    let healthStore = HKHealthStore()
    override func viewDidLoad() {
        super.viewDidLoad()
        // Do any additional setup after loading the view.
    }
    
    @IBAction func authorizeButton(_ sender: Any) {
        self.authorizeHealthKitinApp()
    }
    
    @IBAction func getDetail(_ sender: Any) {
        let (age, bloodtype) = self.readProfile()
        self.ageage.text = "\(String(describing: age!))"
        self.bgroup.text = self.getReadablebloodType(bloodType: bloodtype?.bloodType)
    }
    

    
    @IBAction func infoUpdate(_ sender: Any) {
        self.writeToKit()
    }
    
    func getReadablebloodType(bloodType:HKBloodType?)->String{
        var tt = "";
        if bloodType != nil{
            switch (bloodType) {
            case .oPositive:
                tt = "O+"
            default:
                break
            }
        }
        return tt;
    }

    func readProfile() -> ( age:Int?, bloodtype:HKBloodTypeObject?){
        var age:Int?
        var bloodType:HKBloodTypeObject?
        
        do{
            let birthdat = try healthStore.dateOfBirthComponents()
            let calendar = Calendar.current
            let curY = calendar.component(.year, from: Date())
            age = curY - 1 - birthdat.year!
        }catch{}
        
        do {
            bloodType = try healthStore.bloodType()
        }catch{}
        return(age,bloodType)
    }
    
    func authorizeHealthKitinApp(){
            let healthKitTypesToRead : Set<HKObjectType> = [
                HKObjectType.characteristicType(forIdentifier: HKCharacteristicTypeIdentifier.dateOfBirth)!,
                HKObjectType.characteristicType(forIdentifier: HKCharacteristicTypeIdentifier.bloodType)!,
                HKObjectType.quantityType(forIdentifier: HKQuantityTypeIdentifier.bodyMass)!,
                HKObjectType.quantityType(forIdentifier: HKQuantityTypeIdentifier.dietaryProtein)!
            
            ]

            let healthKitTypesToWrite : Set<HKSampleType> = [HKObjectType.quantityType(forIdentifier: HKQuantityTypeIdentifier.bodyMass)!,
            HKObjectType.quantityType(forIdentifier: HKQuantityTypeIdentifier.dietaryProtein)!]

            if !HKHealthStore.isHealthDataAvailable()
            {
                print("Error")
                return
            }

            healthStore.requestAuthorization(toShare: healthKitTypesToWrite, read: healthKitTypesToRead)
            {
                (success,error) -> Void in
                print("Read and Write pass")
            }

    }
    
    func writeToKit(){
        let wei = Double(self.wupdate.text!)
        let protein = Double(self.ProteinUpdate.text!)
        
        let today = NSDate()
        if let type = HKSampleType.quantityType(forIdentifier: HKQuantityTypeIdentifier.bodyMass){
            let qun = HKQuantity(unit: HKUnit.pound(), doubleValue: Double(wei!))
            
            let sample = HKQuantitySample(type: type, quantity: qun, start: today as Date, end: today as Date)
            
            healthStore.save(sample, withCompletion: { (success,error) in
                print("saved \(success), error \(error)")
            })
        }
        
        if let type = HKSampleType.quantityType(forIdentifier: HKQuantityTypeIdentifier.dietaryProtein){
            
            let pro = HKQuantity(unit: HKUnit.gram(), doubleValue: Double(protein!))
            
            let sample = HKQuantitySample(type: type, quantity: pro, start: today as Date, end: today as Date)
            healthStore.save(sample, withCompletion: { (success,error) in
                print("saved \(success), error \(error)")
            })
        }
    }


}


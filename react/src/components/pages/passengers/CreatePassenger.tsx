import { Link } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { Passenger } from "../../../interfaces/passenger.interface";
import passengerDefault from "../../../interfaces/passenger.interface";

function CreatePassenger() {
    const [passenger, setPassenger] = useState<Passenger>(passengerDefault);
    const [bookings, setBooking] = useState<Booking[]>([]);
    const [passengers, setPassenger] = useState<Passenger[]>([]);

    useEffect(() => {
        document.title = "Create Passenger";
            getPassengers();
            getBookings();
    }, []);

    const getBookings = () => {
        api.get("bookings")
        .then((res) => {
            setBooking(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    const getPassengers = () => {
        api.get("passengers")
        .then((res) => {
            setPassenger(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    function handleSubmit(e: React.FormEvent) {
        e.preventDefault();

        api.post("create-passenger", passenger)
        .then((res) => {
            console.log(res.data);
        })
        .catch((err) => {
            console.log(err);
        });
    }

    return (
        <>
        <div className="container-xxl flex-grow-1 container-p-y">
          <h4 className="fw-bold py-3 mb-4">
            <Link to="/passengers" className="text-muted fw-light">Passengers /</Link> Create
          </h4>
          <div className="card mt-3">
            <h5 className="card-header">Create Passenger</h5>
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label className="form-label">Passenger Id</label>
                        <select name="passenger_id" className="form-select" onChange={(e) => setPassenger({...passenger, passenger_id: parseInt(e.target.value)})}>
                            {
                                passengers.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Booking Id</label>
                        <select name="booking_id" className="form-select" onChange={(e) => setPassenger({...passenger, booking_id: parseInt(e.target.value)})}>
                            {
                                bookings.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Name</label>
                        <input type="text" name="name" className="form-control" 
                        value={passenger.name} 
                        onChange={(e) => setPassenger({...passenger, name: e.target.value})} />
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Age</label>
                        <input type="text" name="age" className="form-control" 
                        value={passenger.age} 
                        onChange={(e) => setPassenger({...passenger, age: e.target.value})} />
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Passport Number</label>
                        <input type="text" name="passport_number" className="form-control" 
                        value={passenger.passport_number} 
                        onChange={(e) => setPassenger({...passenger, passport_number: e.target.value})} />
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Nationality</label>
                        <input type="text" name="nationality" className="form-control" 
                        value={passenger.nationality} 
                        onChange={(e) => setPassenger({...passenger, nationality: e.target.value})} />
                    </div>
                    <button type="submit" className="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
        </>
    );
}

export default CreatePassenger;
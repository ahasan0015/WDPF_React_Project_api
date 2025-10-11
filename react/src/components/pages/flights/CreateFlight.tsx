import { Link } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { Flight } from "../../../interfaces/flight.interface";
import flightDefault from "../../../interfaces/flight.interface";

function CreateFlight() {
    const [flight, setFlight] = useState<Flight>(flightDefault);
    const [flight_types, setFlight_type] = useState<Flight_type[]>([]);
    const [arrival_airports, setArrival_airport] = useState<Arrival_airport[]>([]);
    const [departure_airports, setDeparture_airport] = useState<Departure_airport[]>([]);
    const [airlines, setAirline] = useState<Airline[]>([]);
    const [flights, setFlight] = useState<Flight[]>([]);

    useEffect(() => {
        document.title = "Create Flight";
            getFlights();
            getAirlines();
            getDeparture_airports();
            getArrival_airports();
            getFlight_types();
    }, []);

    const getFlight_types = () => {
        api.get("flight_types")
        .then((res) => {
            setFlight_type(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    const getArrival_airports = () => {
        api.get("arrival_airports")
        .then((res) => {
            setArrival_airport(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    const getDeparture_airports = () => {
        api.get("departure_airports")
        .then((res) => {
            setDeparture_airport(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    const getAirlines = () => {
        api.get("airlines")
        .then((res) => {
            setAirline(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    const getFlights = () => {
        api.get("flights")
        .then((res) => {
            setFlight(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    function handleSubmit(e: React.FormEvent) {
        e.preventDefault();

        api.post("create-flight", flight)
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
            <Link to="/flights" className="text-muted fw-light">Flights /</Link> Create
          </h4>
          <div className="card mt-3">
            <h5 className="card-header">Create Flight</h5>
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label className="form-label">Flight Id</label>
                        <select name="flight_id" className="form-select" onChange={(e) => setFlight({...flight, flight_id: parseInt(e.target.value)})}>
                            {
                                flights.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Airline Id</label>
                        <select name="airline_id" className="form-select" onChange={(e) => setFlight({...flight, airline_id: parseInt(e.target.value)})}>
                            {
                                airlines.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Departure Airport Id</label>
                        <select name="departure_airport_id" className="form-select" onChange={(e) => setFlight({...flight, departure_airport_id: parseInt(e.target.value)})}>
                            {
                                departure_airports.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Arrival Airport Id</label>
                        <select name="arrival_airport_id" className="form-select" onChange={(e) => setFlight({...flight, arrival_airport_id: parseInt(e.target.value)})}>
                            {
                                arrival_airports.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Departure Time</label>
                        <input type="text" name="departure_time" className="form-control" 
                        value={flight.departure_time} 
                        onChange={(e) => setFlight({...flight, departure_time: e.target.value})} />
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Arrival Time</label>
                        <input type="text" name="arrival_time" className="form-control" 
                        value={flight.arrival_time} 
                        onChange={(e) => setFlight({...flight, arrival_time: e.target.value})} />
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Flight Type Id</label>
                        <select name="flight_type_id" className="form-select" onChange={(e) => setFlight({...flight, flight_type_id: parseInt(e.target.value)})}>
                            {
                                flight_types.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <button type="submit" className="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
        </>
    );
}

export default CreateFlight;
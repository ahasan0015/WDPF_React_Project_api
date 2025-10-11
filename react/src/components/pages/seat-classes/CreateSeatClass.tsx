import { Link } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { SeatClass } from "../../../interfaces/seatClass.interface";
import seatClassDefault from "../../../interfaces/seatClass.interface";

function CreateSeatClass() {
    const [seatClass, setSeatClass] = useState<SeatClass>(seatClassDefault);
    const [seat_classs, setSeat_class] = useState<Seat_class[]>([]);

    useEffect(() => {
        document.title = "Create SeatClass";
            getSeat_classs();
    }, []);

    const getSeat_classs = () => {
        api.get("seat_classs")
        .then((res) => {
            setSeat_class(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    function handleSubmit(e: React.FormEvent) {
        e.preventDefault();

        api.post("create-seatClass", seatClass)
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
            <Link to="/seat-classes" className="text-muted fw-light">SeatClasss /</Link> Create
          </h4>
          <div className="card mt-3">
            <h5 className="card-header">Create SeatClass</h5>
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label className="form-label">Seat Class Id</label>
                        <select name="seat_class_id" className="form-select" onChange={(e) => setSeatClass({...seatClass, seat_class_id: parseInt(e.target.value)})}>
                            {
                                seat_classs.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Class Name</label>
                        <input type="text" name="class_name" className="form-control" 
                        value={seatClass.class_name} 
                        onChange={(e) => setSeatClass({...seatClass, class_name: e.target.value})} />
                    </div>
                    <button type="submit" className="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
        </>
    );
}

export default CreateSeatClass;